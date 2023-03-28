from bs4 import BeautifulSoup
import requests
import os
from pathlib import Path
import pandas as pd
import datetime

BASE_PATH = os.getcwd()
DATA_DIR = os.path.join(BASE_PATH, "source_data")


def GetDataProfiling(data_csv_path):
    df = pd.read_csv(data_csv_path)

    stats = df.describe()
    Transposedstats = stats.T
    Transposedstats["Quarter"] = Transposedstats.index
    Transposedstats["Missingcount"] = df.isna().sum().sum()
    Transposedstats["Median"] = df.median(axis=0, skipna=True, numeric_only=True)
    print(Transposedstats.head())
    print(Transposedstats.columns)
    StatsResults = Transposedstats[['Quarter', 'Count', 'Min', 'Max', 'Mean', 'Median', 'STD']]
    return StatsResults


def Timeformatcheck(current_report_df, column_names: list, format: str = "%Y-%m-%d %H:%M:%S"):
    results = {}
    for column_name in column_names:
        ProcessedTsValues = current_report_df[column_name].unique().tolist()
        Time_format_check = "Success"
        for timestamp_value in ProcessedTsValues:
            if isinstance(datetime.datetime.strptime(timestamp_value, format), datetime.datetime) is False:
                Time_format_check = "Failed"
                break
        results.update({column_name: Time_format_check})
    return results


def GetPreviousRptColumns():
    Reports_dir = os.path.join(BASE_PATH, "reports")
    Previous_rpt_columns = []
    for file in os.listdir(Reports_dir):
        if "_data_" in file:
            continue
        else:
            df = pd.read_csv(os.path.join(Reports_dir, file))
            columns = df.columns
        Previous_rpt_columns.extend(columns)
    Unique_previous_cols = set(Previous_rpt_columns)
    return Unique_previous_cols


def MissingColsFromPrevious(current_report_df):
    Missing_cols = GetPreviousRptColumns().difference(set(current_report_df.columns))
    return Missing_cols


def NewColsFromPrevious(current_report_df):
    New_cols = set(current_report_df.columns).difference(GetPreviousRptColumns())
    return New_cols

def DataConsistencyChecks(data_csv_path):
    df = pd.read_csv(data_csv_path)
    Timeformatchecks = Timeformatcheck(df, ["processed_at"])
    Record = {column + "_" + "Time_format_check": status for column, status in Timeformatchecks.items()}
    Missing_cols = MissingColsFromPrevious(df)
    if len(Missing_cols) == 0:
        Missing_cols = ["ALL_GOOD"]
    New_cols = NewColsFromPrevious(df)
    if len(New_cols) == 0:
        New_cols = ["ALL_GOOD"]
    Record.update({"missing_columns_from_previous": "|".join(Missing_cols)})
    Record.update({"new_columns_from_previous": "|".join(New_cols)})
    Data_consistency_df = pd.DataFrame([Record])
    return Data_consistency_df

class EnergyTrends:
    def __init__(self, Web_url: str, Reports_dir_path: str):
        self.Reports_dir_path = Reports_dir_path
        self.Web_url = Web_url

    def WebScrapper(self):
        Response = requests.get(self.Web_url)
        if Response.status_code == 200:
            WebContent = Response.text
            soup = BeautifulSoup(WebContent, 'html.parser')
            return soup
        else:
            Response.raise_for_status()

    def IsFileAlreadyDownloaded(self, File_name: str):
        Existing_files = []
        for Existing_file in os.listdir(DATA_DIR):
            Existing_file = Existing_file.split("/")[-1]
            if "ET_3.1" in Existing_file and Existing_file.endswith(".xlsx"):
                Existing_files.append(Existing_file)

        if File_name in Existing_files:
            return True
        else:
            return False

    def DownloadSupplyUseData(self, file_url: str):
        Response = requests.get(file_url)
        File_name = file_url.split("/")[-1]
        File_path = os.path.join(DATA_DIR, File_name)
        with open(File_path, "wb") as f:
            f.write(Response.content)
        print("Supply & Use of crudeoil, gas and feedstocks file:" + File_name + " is successfully downloaded")
        return File_path

    def ExtractSourceDataLinkFromWebsite(self):
        # Here to extract the Supply and use of crude oil, natural gas liquids, and feedstocks related data we inspect the website link and from there 
        #we get the attachment embedded class name with respect to the link id attachment_715963
        soup = self.WebScrapper()
        sect = soup.find("section", class_="attachment embedded", id="attachment_7159263")
        match = sect.find(name="div")
        File_link = match.a.get('href')
        print("WebScrapping of the url is completed and source_data url extracted: " + File_link)
        return File_link

    def ReadSupplyUseQuarterData(self, excel_File_path: str):
        # using the file link from the website we read the interested Quater data from the xlsx file and then analysing the data and added the processed timestamp and respected file name required.
        df_Quarter = pd.read_excel(excel_File_path, header=4, sheet_name="Quarter")
        df_Quarter = df_Quarter.rename(columns={'Column1': 'Product'})
        df_Quarter["Processed_at"] = datetime.datetime.now()
        df_Quarter["FileName"]=excel_File_Path.split("/")[-1]
        df_Quarter=df_Quarter.fillna('',inplace=True)
        print("Quarter sheet source_data is successfully parsed for: " + excel_File_path)
        return df_Quarter

    def DfToCSV(self, df, File_path):
        df.to_csv(File_path, encoding='utf-8', index=False, date_format="%Y-%m-%d %H:%M:%S")
        
# In this section i have created the 3 kinds reports 1.Data report, 2. Data Profiling and 3. Data Consistency with the file name and respect to timestamp in the .csv fomat 
    def CreateCSVReports(self, Quarter_data: pd.DataFrame, File_name_prefix: str):
        headers = [column.strip().replace(" ", "_").replace("\n", "") for column in Quarter_data.columns]
        Quarter_data.columns = headers
        Timestamp_str = datetime.datetime.now().strftime("%Y%m%d%H%M%S")
        File_name = File_name_prefix + "_" + Timestamp_str + ".csv"
        Data_csv_File_path = os.path.join(self.Reports_dir_path, File_name)
        self.DfToCSV(Quarter_data, Data_csv_File_path)
        print("Quarter data CSV Report is created successfully")

        Profiling_File_name = File_name_prefix + "_data_profiling_" + Timestamp_str +".csv"
        Profiling_data = GetDataProfiling(Data_csv_File_path)
        self.DfToCSV(Profiling_data, os.path.join(self.Reports_dir_path, Profiling_File_name))
        print("Data Profiling report is created successfully")

        Data_Consistency_report = File_name_prefix + "_data_consistency_" + Timestamp_str + ".csv"
        Data_consistency_data = DataConsistencyChecks(Data_csv_File_path)
        self.DfToCSV(Data_consistency_data, os.path.join(self.Reports_dir_path, Data_Consistency_report))
        print("Data Consistency report is created successfully")

    def run(self):
        # This is the main method which triggers the whole process and also checks where the file was downloaded or not if yes it will print already file was downloaded else it will print all the 3 types of reports. 
        Supply_use_File_link = self.ExtractSourceDataLinkFromWebsite()
        Latest_File_name = Supply_use_File_link.split("/")[-1]
        if self.IsFileAlreadyDownloaded(Latest_File_name) is False:
            latest_File_path = self.DownloadSupplyUseData(Supply_use_File_link)
            Quarter_data = self.ReadSupplyUseQuarterData(latest_File_path)
            self.CreateCSVReports(Quarter_data, Latest_File_name.replace(".xlsx", ""))
        else:
            print("The file: " + Latest_File_name + " is already downloaded earlier and hence aborting processing")


if __name__ == '__main__':
    Web_url = "https://www.gov.uk/government/statistics/oil-and-oil-products-section-3-energy-trends"
    Reports_dir = os.path.join(BASE_PATH, "reports")
    Energy_trends = EnergyTrends(Web_url, Reports_dir)
    Energy_trends.run()

