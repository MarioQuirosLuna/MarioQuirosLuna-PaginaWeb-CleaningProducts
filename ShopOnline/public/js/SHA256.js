
// var data="Example1";//Message to Encrypt
const iv  = CryptoJS.enc.Base64.parse("");//giving empty initialization vector
const key = CryptoJS.SHA256("Message");//hashing the key using SHA256
// var encryptedString=encryptData(data,iv,key);
// console.log(encryptedString);//genrated encryption String:  swBX2r1Av2tKpdN7CYisMg==

function encryptData(data){
    if(typeof data=="string"){
        data=data.slice();
        encryptedString = CryptoJS.AES.encrypt(data, key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });
    }
    else{
        encryptedString = CryptoJS.AES.encrypt(JSON.stringify(data), key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });  
    }
    return encryptedString.toString();
}

