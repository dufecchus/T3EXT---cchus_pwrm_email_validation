/*window.onload = function() {
    if (window.jQuery) {
        $(function() {
            $('[id$="___cchus_pwrm_email_validation"]').each(function(i,o){
                var pid = $('#'+$(o).attr("id").substring(0, $(o).attr("id").length - '___cchus_pwrm_email_validation'.length)).attr('id');
                $(this).attr('data-parsley-equalto','#'+pid).attr('data-parsley-error-message', $(this).attr('data-parsley-custom200'));
            });
        });
    } else {
        console.error('jQuery isn\'t loaded and is mandatory for frontend validation. Only backend validation will be available.');
    }
}*/



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
            validationElements.push(object)
        }

    });;
   
  
    verifyFields(validationElements)

   
  })

function verifyFields(validationElements){
    validationElements.forEach((elem)=>{
        var contentA = document.getElementById(`${elem.id}`).value
        var contentB = document.getElementById(`${elem.verificationField}`).value  
        var button = document.querySelector('input[type="submit"]'); 
        var language = navigator.language.split("-")[0]
        
        document.getElementById(`${elem.id}`).addEventListener("input", (event) => {
            contentA = document.getElementById(`${elem.id}`).value
            fieldTest()
        })

        document.getElementById(`${elem.verificationField}`).addEventListener("input", (event) => {
            contentB = document.getElementById(`${elem.verificationField}`).value  
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
                return true;
            }
        }

        function fieldsAreDifferent(){
            button = document.querySelector('input[type="submit"]'); 
            button.disabled = true;
            writeErrorMessage()
        }

        function writeErrorMessage(){

            var elem = document.createElement('div')
            elem.setAttribute("id", "errorMessageDiv")
            button.parentNode.appendChild(elem)
            if (language === "fr"){
            }        
        }


        
    })
}