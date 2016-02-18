<div class="list-group">
    <a href="/contractor/dashboard" class="<?php echo $data->select == 'dashboard' ? 'active' : ''; ?> list-group-item">Dashboard</a>
    <a href="/contractor/edit" class="<?php echo $data->select == 'edit' ? 'active' : ''; ?> list-group-item">Edit Profile</a>
    <a href="/contractor/interviews/received" class="<?php echo $data->select == 'received' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsReceived}}</span>Interviews Received</a>
    <a href="/contractor/interviews/replaced" class="<?php echo $data->select == 'replaced' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsReplaced}}</span>Interviews Replaced</a>
    <a href="/contractor/interviews/accepted" class="<?php echo $data->select == 'accepted' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsAccepted}}</span>Interviews Accepted</a>
    <a href="/contractor/interviews/refused" class="<?php echo $data->select == 'refused' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsRefused}}</span>Interviews Refused</a>
    <a href="/contractor/interviews/feedback" class="<?php echo $data->select == 'feedback' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->interviewStatus->interviewsFeedback}}</span>Interviews Feedback</a>
    <a href="/contractor/projects/active" class="<?php echo $data->select == 'active' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->projectStatus->projectsActive}}</span>Projects Active</a>
    <a href="/contractor/projects/closed" class="<?php echo $data->select == 'closed' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->projectStatus->projectsClosed}}</span>Projects Closed</a>
    <!--<a href="/contractor/jobs/applied" class="<?php echo $data->select == 'applied' ? 'active' : ''; ?> list-group-item"><span class="badge">{{$data->jobStatus->jobsApplied}}</span>Job Positions Applied</a>-->
    <a href="/contractor/logout" class="list-group-item">Logout</a>
</div>