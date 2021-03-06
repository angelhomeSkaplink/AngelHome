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
	var textScore = 0;
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
							
	var textQuestion = Object.keys(survey.data)
                           .filter(function(e){ 
                                return (
                                   e.includes("QuestionText") 
                                )
                            }); 
   //var textQuestionValue = survey.data[textQuestion[0]] ? survey.data[textQuestion[0]] : 0 
 
	textQuestion.forEach(function(val,index){
        console.log(survey.data[val])
        if(!isNaN(survey.data[val])){
        textScore += parseInt(survey.data[val])
        console.log("text:"+parseInt(survey.data[val]))
        }
    })


    radioQuestions.forEach(function(val,index){
        console.log(survey.data[val])
        if(!isNaN(survey.data[val])){
        score += parseInt(survey.data[val])
        console.log("radio:"+parseInt(survey.data[val]))
        }
    }) 

	//alert(radioQuestions);

	// var commentBoxAvgVal = $('#point').val();
    var commentQuestionCount =  commentQuestions.length 

	
	//console.log(commentBoxAvgVal)	
    score +=  parseInt(textScore);
    return score;
}

function submitAnswer(){
    var surveyId = assessment.assessment_id;
	var score = scoreCount();
	//var point = $('#point').val();
	//var totalScore = (parseInt(score) ? parseInt(score):0)+(parseInt(point) ? parseInt(point):0);
	var prosId = $('#pros_id').val();
	var csrf = $('#csrf').val();
	var assessment_period = $('#assessment_period').val();
	// console.log("HERE ", assessment_period);
	var care_plan_date = $('#care_plan_date').val();
    var url =  "/assessment_store";
	
	console.log(survey.data);
	
    var notify = $.notify(
        '<strong>Saving...</strong> Do not close this page.', 
        {
            allow_dismiss: false,
            showProgressbar: true
        }
    );
    console.log(prosId);
    console.log(assessment_period);
    $.post( url, 
    { 
        surveyId: surveyId, 
        answer: {
            data: survey.data
        },
		score: score,
		point: score,
		prosId: prosId,
		assessment_period:assessment_period,
		care_plan_date:care_plan_date,
		_token: csrf
		
    })    
    
    .done(()=>{
        notify.update({
            'type': 'success', 
            'message': '<strong>Success</strong> Your Assessment has been saved!', 
            'progress': 100 
        });
        survey.clear()
		 $.confirm({
            theme: 'modern',
            title:  `Total Score of this Assessment - ${score}`,
            content: ``,
            buttons: {
                Close: function(){
					window.location.replace('/select_assessments/'+assessment_period+'/'+prosId);assessment_period
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
