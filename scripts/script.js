function maxLengthCheck(obj){
    if(obj.value.length > obj.maxLength){
        obj.value = obj.value.slice(0,obj.maxLength)
    }
}