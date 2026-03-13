function login()
{
var i,p;
i=document.getElementById("a").value;
p=Number(document.getElementById("b").value);
if(i === "tanvi" && p === 9903){
	 window.location.href = "C:\Users\Tanvi thakur\OneDrive\Desktop\tanvi's project/index.html.html";
	/*alert("Login Successful");*/
}
	if(i === "tanvi" && p != 9903){
		alert("Wrong Password, Login Unsucessful");
	}
		if(i != "tanvi" && p === 9903){
			alert("Username does not exist, Login Unsuccessful");
		}
		   if(i != "tanvi" && p != 9903){
			   alert("Please Enter valid username and password")
		   }
	

}