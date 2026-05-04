function ready(fn) {
    if (document.readyState !== 'loading') {
      fn();
      return;
    }
    document.addEventListener('DOMContentLoaded', fn);
  }
  ready(function(){

    var validationElements = []
    document.querySelectorAll('*[id]').forEach((element,idx) => {

        
        if (element.id.includes("cchus_pwrm_email_validation")){
            var object= {
                id : element.id.replace("___cchus_pwrm_email_validation",""),
                verificationField : element.id,
            }
            document.getElementById(object.id)
            var field = document.getElementById(object.id)
            var field2 = document.getElementById(object.verificationField)
            var label = field.labels[0]
            var label2 = field2.labels[0]
            

            object["label"] = (String(label.innerHTML)).split("<")[0]
            object["labelElement"] = label
            object["label2"] = (String(label2.innerHTML)).split("<")[0]
            object["label2Element"] = label2

            validationElements.push(object)
        }
    });;
   
  
    verifyFields(validationElements)

   
  })

function verifyFields(validationElements){
    
    validationElements.forEach((elem)=>{
        var contentA = document.getElementById(elem.id).value
        var contentB = document.getElementById(elem.verificationField).value  
        var button = document.querySelector('input[type="submit"]'); 
        var language = navigator.language.split("-")[0]

        var divError = document.createElement('div')
        divError.setAttribute("id", "pwrm_email_validation_errorMessageDiv")
        button.parentNode.appendChild(divError)
        
        document.getElementById(elem.id).addEventListener("input", (event) => {
            contentA = document.getElementById(`${elem.id}`).value
            fieldTest()
        })


        document.getElementById(elem.verificationField).addEventListener("input", (event) => {
            contentB = document.getElementById(elem.verificationField).value  
            fieldTest()
        })
        

        function fieldTest(){
            if (contentA !== contentB)
            {
                fieldsAreDifferent()
                return false;
            }
            if (contentA === contentB && contentA !== ""){
                button.disabled = false;
                document.getElementById("pwrm_email_validation_errorMessageDiv").innerHTML = ""
                elem["labelElement"].style = "color: black;"
                elem["label2Element"].style = "color: black;"

                return true;
            }
        }

        function fieldsAreDifferent(){
            button = document.querySelector('input[type="submit"]'); 
            button.disabled = true;
            writeErrorMessage()
        }

        function writeErrorMessage(){
            elem["labelElement"].style = "color: red;"
            elem["label2Element"].style = "color: red;"
            document.getElementById("pwrm_email_validation_errorMessageDiv").style = "color: red;"

            if (language === "fr"){
                document.getElementById("pwrm_email_validation_errorMessageDiv").innerHTML = "Des champs ne correspondent pas: " + String(elem["label"]).toLowerCase()
            }
            else if (language === "en"){
                document.getElementById("pwrm_email_validation_errorMessageDiv").innerHTML = "Fields does not match: " + String(elem["label"]).toLowerCase()
            }      
        }


        
    })
}