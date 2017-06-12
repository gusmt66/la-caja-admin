//Funcion para ver todos los registros en UsersApp
function getusers() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/users-app/getusers.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver un usuario en específico de la tabla UsersApp
function getuser(id) 
{
$.ajax({
    type: "GET",
    url: 'http://localhost/La%20Caja/users-app/getuser/'+ id+'.json',
    //data: JSON.stringify(articles),
    contentType: "application/json;charset=utf-8",
    success: function (data, status, xhr) 
    {
        //console.log(data);
        //alert();
    },
    error: function (xhr) 
    {
        alert('Ocurrio un error');
        //    alert(xhr.responseText);
    }
});
}
//Funcion para ver todos los registros en Books
function getbooks() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/books/getbooks.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver todos los registros en Gallery
function getGallery() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/pictures/getGallery.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver todos los registros en GlobalParameters
function getParameter() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/global-parameters/getParameter.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver todos los registros en GlobalParameters
function getGeneralInfo() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/general-information/getGeneralInfo.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver todos los registros en Schedules
function getEvents() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/schedules/getEvents.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver un usuario en específico de la tabla Schedules
function getEvent(id) 
{
$.ajax({
    type: "GET",
    url: 'http://localhost/La%20Caja/schedules/getEvent/'+ id+'.json',
    //data: JSON.stringify(articles),
    contentType: "application/json;charset=utf-8",
    success: function (data, status, xhr) 
    {
        //console.log(data);
        //alert();
    },
    error: function (xhr) 
    {
        alert('Ocurrio un error');
        //    alert(xhr.responseText);
    }
});
}
//Funcion para ver todos los registros en GlobalParameters
function getTrivia() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/trivia-questions/getTrivia.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver todos los registros en GlobalParameters
function getSurvey() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja/survey-questions/getSurvey.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}
//Funcion para ver todos los registros en GlobalParameters
function getNewClue() 
{
       $.ajax({
        type: "GET",
        url: 'http://localhost/La%20Caja//getNewClue.json',
        //data: JSON.stringify(data),
        contentType: "application/json;charset=utf-8",
        success: function (data, status, xhr) 
        {
            //console.log(data);
            //alert();
        },
        error: function (xhr) 
        {
            alert('Ocurrio un error');
            //    alert(xhr.responseText);
        }
    }); 
}

