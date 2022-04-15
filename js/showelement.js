var a;
function tampil_tidak()
{
if(a==1)
{
document.getElementById("pilihan").style.display="none";
return a=0;
}
else 
{
document.getElementById("pilihan").style.display="inline";
return a=1;
}
}