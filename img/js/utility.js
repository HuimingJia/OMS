function showPath(){ 
var root = document.getElementById("filepath").value; 
document.getElementById("path").value = root;
document.getElementById("importbtn").style.display = 'block';
document.getElementById("importbtn").disabled = false;
} 

function showTableByClient()
{
document.getElementById("download").name = 'price';
}

function showTablebyClerk(){
document.getElementById("download").name = 'price';
}

function showTablebyFactpru(){
document.getElementById("download").name = 'price';
}