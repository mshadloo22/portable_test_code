
(function($){
    $('[data-toggle="tooltip"]').tooltip();
    studentRoleFunctions();


    menuAndSubmenuFunctions();
})(jQuery);

function studentRoleFunctions(){//check if student choose a subject if he did not set local storage choose_subject=true
    //if he did not choose any set local storage choose_subject=false
    //1. it is student 2. choos atleast a subject
if(user_role.indexOf('student')!=-1 && localStorage.getItem('student_subject_selected')===null){//user role is student and student_subject is undefined
//ajax call to get student_subjectStatus
    console.log('call to get userinfo ');
    var request = $.ajax({
        url: base_url + 'User/'+user_id,
        method: "GET",
        dataType: "json",
        //data: {'_token': $('meta[name=csrf-token]').attr("content")}
    });
    request.done(function (res) {
        //successfull output
        if(res.lst_subjects.length>0){
            localStorage.setItem('student_subject_selected',true);
        }else{
            localStorage.setItem('student_subject_selected',false);
        }
    });
    request.fail(function (jqXHR, textStatus) {
        //failed for output because of status or ...
        console.error('jlkjl234324something happend in query student');
    });

}else if(user_role.indexOf('student')!=-1 && localStorage.getItem('student_subject_selected')=='false'){
    console.log('ppppprompt them to select a subject');
    $('#global-feedback').addClass('alert alert-danger');
    $('#global-feedback').html('<p>Please select one subject by clicking on <a href="'+base_url+'UserCont/selectSubject/'+user_id+'">Select</a> </p>');
}

}

function menuAndSubmenuFunctions(){
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });
}
