<div class="list-group">
    <a href="/client/dashboard" class="<?php echo $data->select == 'dashboard' ? 'active' : ''; ?> list-group-item">Dashboard</a>
    <a href="/client/edit" class="<?php echo $data->select == 'edit' ? 'active' : ''; ?> list-group-item">Edit Profile</a>
    <a href="/client/contractors/search" class="<?php echo $data->select == 'search' ? 'active' : ''; ?> list-group-item">Search Contractor</a>
    <a href="/client/interviews/required" class="<?php echo $data->select == 'required' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsRequired}}</span>Interviews Required</a>
    <a href="/client/interviews/replaced" class="<?php echo $data->select == 'replaced' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsReplaced}}</span>Interviews Replaced</a>
    <a href="/client/interviews/accepted" class="<?php echo $data->select == 'accepted' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsAccepted}}</span>Interviews Accepted</a>
    <a href="/client/interviews/refused" class="<?php echo $data->select == 'refused' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsRefused}}</span>Interviews Refused</a>
    <a href="/client/interviews/feedback" class="<?php echo $data->select == 'feedback' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsFeedback}}</span>Interviews Feedback</a>
    <a href="/client/projects/active" class="<?php echo $data->select == 'active' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->projectStatus->projectActive}}</span>Project Active</a>
    <a href="/client/logout" class="list-group-item">Logout</a>
</div>