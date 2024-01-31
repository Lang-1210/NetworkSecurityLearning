import hashlib

def md5_encrypt(text):
    # 创建 MD5 对象
    md5 = hashlib.md5()

    # 更新 MD5 对象
    md5.update(text.encode('utf-8'))

    # 获取加密后的结果
    encrypted_text = md5.hexdigest()

    return encrypted_text

# 要加密的文本
text = input("请输入要加密的文本：")

# 进行 MD5 加密
encrypted_text = md5_encrypt(text)

# 输出加密后的结果
print("MD5 加密后的结果：", encrypted_text)