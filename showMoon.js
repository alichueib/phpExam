const  showMoon = (str,divID) =>{
    let http=new XMLHttpRequest();
    http.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            let myArr=JSON.parse(this.responseText);
            insertIntoDropDown(myArr,divID);
        }
    }
    http.open("GET","getMoonAPI.php?pid="+str,true);
    console.log("getMoonAPI.php?pid="+str);
    http.send();
}
let display='';
function insertIntoDropDown(array, divID) {
    display = '';
    display += 'Moon<select name="chosenMoon"><option selected>Choose a moon</option>';
    array.forEach((row) => {
        display += '<option value="' + row['M_ID'] + '">' + row['M_Name'] + ' </option>';
    });
    display += '</select>';
    document.getElementById(`${divID}`).innerHTML = display;
}
