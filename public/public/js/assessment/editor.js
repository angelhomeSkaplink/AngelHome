Survey.dxSurveyService.serviceUrl = "";
var editorOptions = {
  questionTypes: ["text", "checkbox", "radiogroup", "dropdown","comment"]
};
var editor = new SurveyEditor.SurveyEditor("editor", editorOptions);
var surveyId = $('#assessment_id').val();
var csrf = $('#csrf').val();

//Name field read only
Survey
      .JsonObject
      .metaData
      .findProperty("questionbase", "name")
      .readOnly = true;

var questionCounter = 1;

function UID() {

  return '_' + Math.random().toString(36).substr(2, 9);
};

editor
    .onQuestionAdded
    .add(function (sender, options) {
        var q = options.question;
        var t = q.getType();
        q.name = "Question" + t[0].toUpperCase() + t.substring(1) + UID();
        q.tag = guid();
        questionCounter++;
    });

function guid() {
    function s4() {
        return Math
            .floor((1 + Math.random()) * 0x10000)
            .toString(16)
            .substring(1);
    }
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

// editor.loadSurvey(surveyId);
// editor.text = JSON.stringify({
//   "title": "Test",
//   "pages": [
//    {
//     "name": "page1",
//     "elements": [
//      {
//       "type": "comment",
//       "name": "question2"
//      },
//      {
//       "type": "radiogroup",
//       "name": "question1",
//       "choices": [
//        "item1",
//        "item2",
//        "item3"
//       ]
//      }
//     ]
//    }
//   ]
// });


editor.saveSurveyFunc = function(saveNo, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open(
    "POST",
    "/angel_home/saveAssessment?surveyId="+surveyId
  );
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onload = function() {
    var result = xhr.response ? JSON.parse(xhr.response) : null;
    if (xhr.status === 200) {
      callback(saveNo, true);
    }
  };
  xhr.send(
    JSON.stringify({
      surveyId: surveyId, 
	  assessment_form_name: JSON.parse(editor.text).title,
      Json: editor.text,
	  _token: csrf
    })
  );
};

// editor.isAutoSave = true;
editor.haveCommercialLicense = true;
editor.showState = true;
editor.showOptions = true;
