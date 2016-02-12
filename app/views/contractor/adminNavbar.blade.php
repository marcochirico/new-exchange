<div class="list-group">
    <a href="/contractor/dashboard" class="list-group-item">Dashboard</a>
    <a href="/contractor/edit" class="list-group-item">Edit Profile</a>
    <a href="/contractor/interviews/received" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsReceived}}</span>Interviews Received</a>
    <a href="/contractor/interviews/replaced" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsReplaced}}</span>Interviews Replaced</a>
    <a href="/contractor/interviews/accepted" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsAccepted}}</span>Interviews Accepted</a>
    <a href="/contractor/interviews/refused" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsRefused}}</span>Interviews Refused</a>
    <a href="/contractor/interviews/feedback" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsFeedback}}</span>Interviews Feedback</a>
    <a href="/contractor/projects/active" class="list-group-item"><span class="badge">{{$data->projectStatus->projectsActive}}</span>Projects Active</a>
    <a href="/contractor/projects/closed" class="list-group-item"><span class="badge">{{$data->projectStatus->projectsClosed}}</span>Projects Closed</a>
    <a href="/contractor/jobs/applied" class="list-group-item"><span class="badge">{{$data->jobStatus->jobsApplied}}</span>Job Positions Applied</a>
    <a href="/contractor/logout" class="list-group-item">Logout</a>
</div>