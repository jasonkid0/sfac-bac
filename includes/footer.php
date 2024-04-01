<!-- alert -->
<?php
if (isset($_SESSION['emptyImg'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="dangerToast"
                            id="autoClickBtn" hidden>
                        </a>';
} elseif (isset($_SESSION['successImg'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successImg"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successUpdate'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successUpdate"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['oldNotMatch'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="oldNotMatch"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['newNotMatch'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="newNotMatch"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['notMatch'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="notMatch"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successPass'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successPass"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successDel'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successDel"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successAddDep'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successAddDep"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['fill'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fill"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['fill-Uinfo'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fill-Uinfo"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['subjExisting'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="subjExisting"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['subjAdded'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="subjAdded"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successAdd'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successAdd"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['depExist'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="depExist"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['usernameExist'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="usernameExist"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successCalendar'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successCalendar"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successYear'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successYear"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['studAdded'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="studAdded"
       id="autoClickBtn" hidden>
   </a>';
} elseif (isset($_SESSION['studExist'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="studExist"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['courAdded'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="courAdded"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['courExist'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="courExist"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['fill-select'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fill-select"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['stud_noExist'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="stud_noExist"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['enroll_success'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="enroll_success"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['delSubjects'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="delSubjects"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['FDSub'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="FDSub"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['SASub'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="SASub"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['FASub'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="FASub"
          id="autoClickBtn" hidden>
      </a>';
    //   lorenzo
} elseif (isset($_SESSION['yearUpdated'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="yearUpdated"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['yearExist'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="yearExist"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['yearDelete'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="yearDelete"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['subjUpdate'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="subjUpdate"
       id="autoClickBtn" hidden>
   </a>';
} elseif (isset($_SESSION['inquiryComplete'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="inquiryComplete"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['inquiryAdmitted'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="inquiryAdmitted"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['successEAY'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successEAY"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['DEAY'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="DEAY"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['AFill'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="AFill"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['exist_schedule'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="exist_schedule"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['SASched'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="SASched"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['SDCSched'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="SDCSched"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['ACheck'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="ACheck"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['ACanceled'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="ACanceled"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['RDisapproved'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="RDisapproved"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['fee_success'])) { ////////////////////////////////////////////////////////////////////////////////////////////////////
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fee_success"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['fee_exists'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fee_exists"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['fee_updated'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fee_updated"
             id="autoClickBtn" hidden>
         </a>'; 
} elseif (isset($_SESSION['discount_success'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="discount_success"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['discount_updated'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="discount_updated"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['discount_exists'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="discount_exists"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['assessment_success'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="assessment_success"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['assessment_updated'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="assessment_updated"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['assessment_exists'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="assessment_exists"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['stud_not_exists'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="stud_not_exists"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['dates_success'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="dates_success"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['dates_updated'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="dates_updated"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['dates_exists'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="dates_exists"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['payment_updated'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="payment_updated"
             id="autoClickBtn" hidden>
         </a>';
}  elseif (isset($_SESSION['updates_exists'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="updates_exists"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['target_exists'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="target_exists"
             id="autoClickBtn" hidden>
         </a>';
} elseif (isset($_SESSION['ImgSizeError'])) {
    echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="ImgSizeError"
             id="autoClickBtn" hidden>
         </a>';
}

unset($_SESSION['emptyImg']);
unset($_SESSION['successImg']);
unset($_SESSION['successUpdate']);
unset($_SESSION['oldNotMatch']);
unset($_SESSION['newNotMatch']);
unset($_SESSION['successPass']);
unset($_SESSION['successDel']);
unset($_SESSION['successAddDep']);
unset($_SESSION['notMatch']);
unset($_SESSION['fill']);
unset($_SESSION['fill-Uinfo']);
unset($_SESSION['subjExisting']);
unset($_SESSION['subjAdded']);
unset($_SESSION['successAdd']);
unset($_SESSION['depExist']);
unset($_SESSION['usernameExist']);
unset($_SESSION['successCalendar']);
unset($_SESSION['successYear']);
unset($_SESSION['studAdded']);
unset($_SESSION['studExist']);
unset($_SESSION['courAdded']);
unset($_SESSION['courExist']);
unset($_SESSION['fill-select']);
unset($_SESSION['stud_noExist']);
unset($_SESSION['enroll_success']);
unset($_SESSION['delSubjects']);
unset($_SESSION['FDSub']);
unset($_SESSION['SASub']);
unset($_SESSION['FASub']);
unset($_SESSION['successEAY']);
unset($_SESSION['DEAY']);
unset($_SESSION['AFill']);
unset($_SESSION['exist_schedule']);
unset($_SESSION['SASched']);
unset($_SESSION['SDCSched']);
unset($_SESSION['ACheck']);
unset($_SESSION['ACanceled']);
unset($_SESSION['RDisapproved']);


//   lorenzo
unset($_SESSION['yearUpdated']);
unset($_SESSION['yearExist']);
unset($_SESSION['yearDelete']);
unset($_SESSION['subjUpdate']);
unset($_SESSION['inquiryComplete']);
unset($_SESSION['inquiryAdmitted']);

unset($_SESSION['fee_success']);
unset($_SESSION['fee_exists']);
unset($_SESSION['fee_updated']);

unset($_SESSION['discount_success']);
unset($_SESSION['discount_exists']);
unset($_SESSION['discount_updated']);

unset($_SESSION['assessment_success']);
unset($_SESSION['assessment_exists']);
unset($_SESSION['assessment_updated']);

unset($_SESSION['stud_not_exists']);

unset($_SESSION['dates_success']);
unset($_SESSION['dates_exists']);
unset($_SESSION['dates_updated']);

unset($_SESSION['payment_updated']);

unset($_SESSION['updates_exists']);
unset($_SESSION['target_exists']);
unset($_SESSION['ImgSizeError']);


?>

<div class="position-fixed top-2 end-1 z-index-3">

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="RDisapproved" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Disapproved!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student has been Successfully Disapproved.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="ACanceled" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Canceled!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student has been Successfully Canceled.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="ACheck" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Approved!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student has been Successfully Approved.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="SDCSched" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Deleted!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The Class Schedule has been successfully deleted.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="SASched" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Schedule of a subject has been successfully Added.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="exist_schedule"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Already Exist!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Set of Schedule is already exist!
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="AFill" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Required Fields!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please complete all required fields.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="FASub" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Failed to Add Subject/s</span>
            <small class="text-body"></small> <i class="fas fa-times text-md ms-3 cursor-pointer"
                data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please select a subject/s
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="SASub" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The selected Subject/s has been successfully Added.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="FDSub" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Failed to delete subject/s!</span>
            <small class="text-body"></small> <i class="fas fa-times text-md ms-3 cursor-pointer"
                data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please select a subject/s
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="delSubjects" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Deleted!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The selected Subject/s has been successfully deleted.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="enroll_success" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Success!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Successfully Registered!
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="fill-select"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Required Fields!</span>
            <small class="text-body"></small> <i class="fas fa-times text-md ms-3 cursor-pointer"
                data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please complete all Select fields.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="studExist" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Already exist!</span>
            <small class="text-body"></small> <i class="fas fa-times text-md ms-3 cursor-pointer"
                data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student number already exist!
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="studAdded" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Student Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student Successfully Added!
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="courAdded" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Course Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfull added a course.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="courExist" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Course is Existing!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The course you're trying to input already exists.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="stud_noExist"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Failed to Save!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student Number is already exist.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="usernameExist"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Failed to Save!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Username is already exist.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="depExist" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Failed!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            This Department is Already Exist.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successAddDep" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Success!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            New Department Successfully Added.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="fill-Uinfo"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Required Fields!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please complete all required fields in User Info.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="fill" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Required Fields!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please complete all required fields in User Account.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successAdd" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You have successfully added the new user account.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successDel" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Deleted!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The selected account has been successfully deleted.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successPass" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Password Changed!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Your password has been changed successfully.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Upload Error!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please select an image and try again.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="oldNotMatch"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Incorrect Password!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The current password you entered is incorrect. Please try again.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="newNotMatch"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">New passwords do not match!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The password confirmation does not match. Please try again.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="notMatch" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Passwords do not match!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The password confirmation does not match. Please try again.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successImg" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Upload Complete!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Image Successfully Uploaded.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successUpdate" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Save Complete!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Successfully Updated.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="subjExisting"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Subject is Existing!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The subject you're trying to input already exists.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="subjAdded" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Subject Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully added a subject.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successCalendar"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Calendar Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully updated Academic Calendar!
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successYear" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Academic Year Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully added an Academic Year!
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successEAY" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully added an Effective Academic Year!
        </div>
    </div>
    <!-- Lorenzo -->
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="subjUpdate" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Subject Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully updatet the subject.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="yearExist" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Academic Year is Existing!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The academic year you're trying to input already exists.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="yearUpdated" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Academic Year Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully updated an academic year.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="yearDelete" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Academic Year Deleted!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully deleted an academic year.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="DEAY" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Deleted!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully deleted an Effective Academic Year
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="inquiryComplete"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Inquiry Registered!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfully registered your inquiries.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="inquiryAdmitted"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Inquiry Registered!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Inquiry successfully admitted.
        </div>
    </div>
    <!-- //////////////////////////////// -->
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="fee_success"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Fee Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Fee successfully added.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="fee_exists" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Fee Exists!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Fee already exists.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="fee_updated"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Fee Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Fee successfully updated.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="discount_success"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Discount Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Discount successfully added.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="discount_exists" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Discount Exists!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Discount already exists.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="discount_updated"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Discount Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Discount successfully updated.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="assessment_success"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Assessment Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Assessment successfully added.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="assessment_exists" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Assessment Exists!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Assessment already exists.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="assessment_updated"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Assessment Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Assessment successfully updated.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="stud_not_exists" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Error!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Error Student Number!
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="dates_success"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Installment Dates Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Installment Dates successfully added.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dates_exists" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Installment Dates Exists!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Installment Dates already exists.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="dates_updated"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Installment Dates Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Installment Dates successfully updated.
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="payment_updated"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Payment Status Updated!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Payment Status successfully updated.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="updates_exists"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-danger me-2"></i>
            <span class="me-aume-auto text-gradient text-danger font-weight-bold">Daily Update Already Exists!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Update on this day has already been added!
        </div>
    </div>

    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="target_exists"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-danger me-2"></i>
            <span class="me-aume-auto text-gradient text-danger font-weight-bold">Target Enrollees Exists!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Target for this Academic Year has already been set!
        </div>
    </div>
    
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="ImgSizeError"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-danger me-2"></i>
            <span class="me-aume-auto text-gradient text-danger font-weight-bold">Error Image Size!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Uploaded Image Exceeds 1MB!
        </div>
    </div>
    <!-- End of Lorenzo -->

</div>

<!-- End alert -->
<hr class="horizontal dark mb-2">
<footer class="footer pt-3">
    <div class="container-fluid">
        <div class="row justify-content-lg-evenly">
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card bg-gradient-dark">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-white text-sm mb-0 opacity-7">Academic Year</p>
                                    <h6 class="text-white font-weight-bold mb-0">
                                        <?php echo $_SESSION['AC']; ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                    <i class="fas fa-bookmark text-dark text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card bg-gradient-dark">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-white text-sm mb-0 opacity-7">Semester</p>
                                    <h6 class="text-white font-weight-bold mb-0">
                                        <?php echo $_SESSION['S']; ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                    <i class="fab fa-font-awesome-flag text-dark text-lg opacity-10"
                                        aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="info-horizontal dark mt-md-2">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-2">
                <div class="copyright text-center text-sm text-muted text-lg-start pb-md-2">
                    &copy; 2021,
                    CompStud.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a class="nav-link">SFAC <?php echo $sch_ad; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>