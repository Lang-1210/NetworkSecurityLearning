from zipfile import ZipFile
import itertools
import time
import argparse
import time
import warnings
warnings.filterwarnings("ignore")

def get_time():
    mtime=time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
    # assert isinstance(mtime, str)
    # assert len(mtime) == 19
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

def uncompress(filename,password,output="./"):
    try:
        with ZipFile(filename) as zip_ref:
            zip_ref.extractall(output,pwd=password.encode('utf-8'))
        return True
    except:
        return False


# 生成密码
# def generate_passwd():
#     chars="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRST"
#     for c in itertools.permutations(chars,4):
#         password="".join(c)
        


def main():
    parser = argparse.ArgumentParser(description='命令行参数示例')
    # 添加参数选项
    parser.add_argument('-n', '--num', type=str, help='生成的密码位数')
    parser.add_argument('-f', '--file', type=str, help='要解压的文件')
    parser.add_argument('-o', '--output', type=str, help='解压后文件的保存路径')
    # 解析命令行参数
    args = parser.parse_args()

    n=args.num
    file=args.file
    output=args.output
    chars="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRST"

    if n and file:
        for c in itertools.permutations(chars,int(n)):
            password="".join(c)
            res=uncompress(file,password,output)
            if res:
                print_colored(f"解压成功 success the password is: {password}\n","green")
                break
            else:
                print_colored(f"解压失败: Test Pass {password}\n","red")
            time.sleep(0.1)
    else:
        print_colored("参数错误\n","yellow")


if __name__ == '__main__':
    main()