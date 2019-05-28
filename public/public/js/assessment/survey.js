function app(survey,Survey){
    Survey
        .StylesManager
        .applyTheme("green");
  
    // The json variaable is available in question.js file
    // Adding new locale into the library.
    // The json variaable is available in config.js file
    var mycustomSurveyStrings = config;
    
    Survey.surveyLocalization.locales["my"] = mycustomSurveyStrings;
    survey.locale = "my";

    function loadState(survey) {

        //Set the loaded data into the survey.
        var res = {
            currentPageNo: 0,
            data: {}
        };
        if (res.currentPageNo >= 0 ) 
            survey.currentPageNo = res.currentPageNo;
        if (res.data)
            survey.data = res.data;
        window.location.hash = "section" + (survey.currentPageNo + 1);
    }

    //Load the initial state
    //For Non Optional section
    loadState(survey);
    function saveState(survey) {
        var res = {
            currentPageNo: survey.currentPageNo,
            data: survey.data
        };

        // Here should be the code to save the data into your database
        // localStorage
        // .setItem(storageName, JSON.stringify(res));
    }
    
    survey
        .onCurrentPageChanged
        .add(function (survey, options) {
            saveState(survey);
            window.location.hash = "section" + (survey.currentPageNo + 1);
        });
        

    survey
        .onComplete
        .add(function (survey, options) {
            if(survey.isCompleted){
                saveState({
                    currentPageNo: 0,
                    data: null
                })    
            }else{
                saveState(survey)
            }
        });
    
  
    function gotoPageByHash(hash) {
        if(!hash || hash.indexOf("#section") != 0) return;
        hash = hash.replace("#section", "");
        var index = Number.parseInt(hash);
        if(index > 0) {
            index -- ;
            survey.currentPageNo = index;
        }
    }
  
    gotoPageByHash(window.location.hash);
    window.onhashchange = function () {
        gotoPageByHash(window.location.hash);
    } 

    /**
     *  Custom Validation start
     */
    /**
     * 
     * News Sources custom  validation 
     */
    function surveyValidateQuestion(s, options) {
        if(typeof validation == "function"){
            validation(s,options)
        } 
    }
    /**
     *  Custom Validation End
     */
    //Load the initial state
    //For Optional section
    loadState(survey);
    $("#surveyElement").Survey({ model: survey, onValidateQuestion: surveyValidateQuestion });

}

var score = 0;

(function(){
    var json = assessment.assessment_json
    var validationString = null;
    var surveyId = null
    window.survey = new Survey.Model(json);
    app(window.survey,Survey)
})()
  