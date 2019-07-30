function onSubmitForm() {
if(document.getElementById("choose").value === 'Delete')
    {
    if( confirm('Czy na pewno chcesz usunąć dokumenty?'))
        {
            document.getElementById("formDelete").action = "/main";
            document.getElementById("formDelete").method = "POST";
            document.getElementById("method").value = "Delete";
        }
    }
else if (document.getElementById("choose").value === 'Return')
    {
    if( confirm('Czy na pewno chcesz zwrócić dokumenty?'))
        {
            document.getElementById("formDelete").action = "/main/share";
            document.getElementById("formDelete").method = "POST";
            document.getElementById("method").value = "Patch";
        }
    }
else if (document.getElementById("choose").value === 'Share')
    {
    if( confirm('Czy na pewno chcesz udostępnić dokumenty?'))
        {
            document.getElementById("formDelete").action = "/main/share";
            document.getElementById("formDelete").method = "GET";
        }
    }
    
else if (document.getElementById("choose").value === 'Export')
    {
    if (confirm('Czy na pewno chcesz eskportować dokumenty?'))
        {
            document.getElementById("formDelete").action = "/export";
            document.getElementById("formDelete").method = "POST";
        }
    };

                        }


