function readStudent()
{
    $('#mainArea').load('src/student/readStudent.php');
}

function readTeacher()
{
    $('#mainArea').load('src/student/readTeacher.php');
}

function addAttendance(Id,type)
{
	// console.log(Id);
	// console.log(type);
	$.ajax({
        type: 'post',
        url: 'src/student/addAttendance.php',
        data:{
            Id: Id,
            type: type
        },
        success:function(response){
            $('#mainArea').html(response);
        }
    });
	return false;
}

function attSave(type,Id)
{
     var formData = new FormData($("#inquiryForm")[0]);
    formData.append("Id", Id);
    formData.append("type", type);

    $.ajax({
        type: 'post',
        url: 'src/student/saveAttendance.php',
        data:formData,
        processData: false,
        contentType: false,
        success:function(response){
            $('#mainArea').html(response);
        }
    });
    return false;
}

function attByMonth(value,id)
{
    // console.log(value,id);
    var tdId = document.getElementById(id);
    $.ajax({
        type: 'post',
        url: 'src/student/attByMonth.php',
        data:{
            value: value,
            id: id
        },
        success:function(response){
            
            tdId.innerHTML = response;
        }
    });
    
}
