
function ShowotherEvent() {
    var event_code = document.getElementById("event_code");
    var othereventShow = document.getElementById("othereventShow");
    othereventShow.style.display = event_code.value == "event_others" ? "block" : "none";
	var fallInfo = document.getElementById("fallInfo");
	fallInfo.style.display = event_code.value == "Fall" ? "block" : "none";
}

function ShowotherLocation() {
    var location_code = document.getElementById("location_code");
    var otherlocationShow = document.getElementById("otherlocationShow");
    otherlocationShow.style.display = location_code.value == "location_others" ? "block" : "none";
}

function ShowotherInjury() {
    var injury_code = document.getElementById("injury_code");
    var otherinjuryShow = document.getElementById("otherinjuryShow");
    otherinjuryShow.style.display = injury_code.value == "injury_others" ? "block" : "none";
	var skinInfo = document.getElementById("skinInfo");
	skinInfo.style.display = (  injury_code.value == "Skin-Tear" || injury_code.value == "Bruise" ) ? "block" : "none";
	console.log(injury_code.value);
}

function ShowotherActiontaken() {
    var action_taken = document.getElementById("action_taken");
    var nonActionShow = document.getElementById("nonActionShow");
    nonActionShow.style.display = action_taken.value == "non_action" ? "block" : "none";
}

function Showothercp() {
    var cp_update = document.getElementById("cp_update");
    var othercpShow = document.getElementById("othercpShow");
    othercpShow.style.display = cp_update.value == "specify_others" ? "block" : "none";
}

function Showbloodsuger() {
    var diabetic = document.getElementById("diabetic");
    var sugerShow = document.getElementById("sugerShow");
    sugerShow.style.display = diabetic.value == "Yes" ? "block" : "none";
}

function ShowEnv() {
    var environmental_issues = document.getElementById("environmental_issues");
    var envSpecify = document.getElementById("envSpecify");
    envSpecify.style.display = environmental_issues.value == "Yes" ? "block" : "none";
}

function ShowLoc() {
    var resident_location_when_found = document.getElementById("resident_location_when_found");
    var locSpecify = document.getElementById("locSpecify");
    locSpecify.style.display = resident_location_when_found.value == "Others" ? "block" : "none";
}

function ShowVisitor() {
    var visitor_prior_8_hours = document.getElementById("visitor_prior_8_hours");
    var visitorSpecify = document.getElementById("visitorSpecify");
    visitorSpecify.style.display = visitor_prior_8_hours.value == "Yes" ? "block" : "none";
}

function ShowStaff() {
    var new_staff_assigned = document.getElementById("new_staff_assigned");
    var staffSpecify = document.getElementById("staffSpecify");
    staffSpecify.style.display = new_staff_assigned.value == "Yes" ? "block" : "none";
}

function ShowBehave() {
    var behavior_issues_past_72_hours = document.getElementById("behavior_issues_past_72_hours");
    var behaveSpecify = document.getElementById("behaveSpecify");
    behaveSpecify.style.display = behavior_issues_past_72_hours.value == "Yes" ? "block" : "none";
}

function ShowBehave() {
    var equipment_issues = document.getElementById("equipment_issues");
    var equipmentSpecify = document.getElementById("equipmentSpecify");
    equipmentSpecify.style.display = equipment_issues.value == "Yes" ? "block" : "none";
}

function ShowSeated() {
    var seated_next_to = document.getElementById("seated_next_to");
    var personSpecify = document.getElementById("personSpecify");
    personSpecify.style.display = seated_next_to.value == "Yes" ? "block" : "none";
}

function ShowBevEnv() {
    var behaviour_environmental_issues = document.getElementById("behaviour_environmental_issues");
    var envbevSpecify = document.getElementById("envbevSpecify");
    envbevSpecify.style.display = behaviour_environmental_issues.value == "Yes" ? "block" : "none";
}

function ShowCareGiver() {
    var unfamiliar_care_giver = document.getElementById("unfamiliar_care_giver");
    var caregivername = document.getElementById("caregivername");
    caregivername.style.display = unfamiliar_care_giver.value == "Yes" ? "block" : "none";
}

function ShowResidentAlter() {
    var alterTab = document.getElementById("alterTab");
	alterTab.style.display = $('#check_notice_desc').is(":checked") ? "block" : "none";
}

function ShowNeedAssessment() {
    var need_assessment = document.getElementById("need_assessment");
    var needAssessmentShow = document.getElementById("needAssessmentShow");
    needAssessmentShow.style.display = need_assessment.value == "Yes" ? "block" : "none";
}

function ShowRulledOut(){
    var rulled_out = document.getElementById("rulled_out");
    var how_rulled_out = document.getElementById("rulled_txt");
    how_rulled_out.style.display = rulled_out.value == "yes" ? "block" : "none";
}
