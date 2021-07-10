
function inputVali(){

if(document.myform.username.value ==""){
  alert("Please enter Name!");
  document.myform.username.focus();
  return false;
}
if(document.myform.password.value ==""){
  alert("please enter Password!");
  document.myform.username.focus();
  return false;
}
if(document.myform.matric.value==""){
  alert("please enter Matric.No!");
  document.myform.matric.focus();
  return false;
}

if(document.myform.mail.value==""){
  alert("Please enter Email!");
  document.myform.mail.focus();
  return false;
}
if(document.myform.one.value==0 &&(document.myform.one.value.length>12)){
  alert("Please ennter Phone with 11 numbers!");
  document.myform.one.focus();
  return false;
}


}
