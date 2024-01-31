import employerToggle from "./employerToggle";
import jobStatusToggle from "./jobStatusToggle";
import employers from "./site-assets/employers";
import candidateListAction from "./candidateListAction";
import candidate from "./site-assets/candidate";
import jobs from "./site-assets/jobs";
import editJobValidation from "./site-assets/jobs-Edit";
import resumeDownload from "./resumeDownload";


let var_token = $('meta[name="csrf-token"]').attr('content');
$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': var_token
   }
})
window.baseUrl = $('meta[name=base-url]').attr('content');
const register = (() => {
   employerToggle();
   candidateListAction();
   jobStatusToggle();
   candidate();
   employers();
   jobs();
   editJobValidation();
   resumeDownload();

});
register();