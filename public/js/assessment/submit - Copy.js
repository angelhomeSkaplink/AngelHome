survey.setCompleted = function(){ 
  surveySubmit() 
}
function surveySubmit(){
  if(!window.navigator.onLine){
      $.confirm({
          title: 'Confirm Submission!',
          content: `At present, you don't have internet connectivity`,                
          theme: 'dark',
          buttons: {
              close: function () {
                  //
              }
          }
      });
  }else{
      $.confirm({
          title: 'Confirm Submission!',
          content: 'Are you Sure!',
          theme: 'dark',
          buttons: {
              confirm: function () {
                  submitAnswer()
              },
              cancel: function () {
                  //
              }
          }
      });
  }
}

function scoreCount(){
	
    var score = 0;
    var radioQuestions = Object.keys(survey.data)
                            .filter(function(e){ 
                                return (
                                    e.includes("QuestionRadiogroup") || 
                                    e.includes("QuestionDropdown") ||
                                    e.includes("QuestionCheckbox") 
                                );
                            });
    var commentQuestions = Object.keys(survey.data)
                            .filter(function(e){ 
                                    return (
                                        e.includes("QuestionComment") 
                                    )
                            });
							
	console.log(commentQuestions)
							
 //   var textQuestion = Object.keys(survey.data)
 //                               .filter(function(e){ 
 //                                       return (
 //                                           e.includes("QuestionText") 
 //                                       )
 //                               }); 
 //   var textQuestionValue = survey.data[textQuestion[0]] ? survey.data[textQuestion[0]] : 0 
 
    radioQuestions.forEach(function(val,index){
        score += parseInt(survey.data[val])
    })

	var commentBoxAvgVal = $('#point').val();
    var commentQuestionCount =  commentQuestions.length 

	console.log(commentBoxAvgVal)	
	console.log(commentQuestionCount)
    score += commentQuestionCount * parseInt(commentBoxAvgVal);
    return score;
}

function submitAnswer(){
    var surveyId = assessment.assessment_id;
	var score = score;
	console.log(score)
	var prosId = $('#pros_id').val();
	var csrf = $('#csrf').val();
    var url =  "../angel_home/assessment_store";
    var notify = $.notify(
        '<strong>Saving...</strong> Do not close this page.', 
        {
            allow_dismiss: false,
            showProgressbar: true
        }
    );
    $.post( url, 
    { 
        surveyId: surveyId, 
        answer: {
            data: survey.data
        },
		score: score ,
		prosId: prosId,
		_token: csrf
		
    })
    .done(()=>{
        notify.update({
            'type': 'success', 
            'message': '<strong>Success</strong> Your survey has been saved!', 
            'progress': 100 
        });
        survey.clear()
		 $.confirm({
            theme: 'modern',
            title:  `Score - ${score}`,
            content: ``,
            buttons: {
                Close: function(){
					//window.location.replace('../angel_home/resident_assessment');
                }
            }
        });
		
        
    })
    .fail(_=>{
        $.notify({
            message: `Something Went Wrong!`
        },{
            type: 'danger'
        });
    })
}
