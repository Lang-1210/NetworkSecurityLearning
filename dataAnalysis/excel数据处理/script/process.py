import pandas as pd
import os
import argparse


def get_current_file_dir():
    return os.path.dirname(__file__)

# 调用函数示例
file_dir = get_current_file_dir()
def main():
    parser = argparse.ArgumentParser(description='命令行参数说明')
    # 添加参数选项
    parser.add_argument('-f', '--file', type=str, help='要处理的excel文件路径')
    parser.add_argument('-o', '--output', type=str, help='输出路径')
    # 解析命令行参数
    args = parser.parse_args()
    
    if args.file is not None and args.output is not None:
        danwei_name=input("请输入资产名:")
        page_num=int(input("请输入每个exel要存放多少条数据:"))
        df = pd.read_excel(args.file)
        # 重命名列名
        new_column={"URL":"url","link":"url"}
        df=df.rename(columns=new_column)
        # 删除包含空缺单元格的行
        df = df.dropna(subset=['url'])
        df=df.drop(df.loc['ftp' in df['City']].index)
        # 删除重复值 
        df=df.drop_duplicates('url')
        # 取出要处理的数据
        urls=df["url"]
        # 计数器
        num=1  
        try:
            # 分页截取
            for i in range(0, len(urls), page_num):
                """ 
                0,100
                100,200
                200,300,
                300,400
                """
                page = urls[i:i+100]
                table=list(zip(page,[num]*100))
                file_name=f"{danwei_name}_{num}.csv"
                new_df=pd.DataFrame(table,columns=None)
                new_df.to_csv(os.path.join(args.output,file_name),header=False,index=False)
                print(new_df)
                num+=1
            print("写入完毕")
        except Exception as e:
            print("写入失败",e)
    else:
        print("参数不完整")
        print("example:python process -f 'xxx.xlsx' -o 'D:/xxx/xxx/xxx'")
        

main()