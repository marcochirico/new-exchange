<div class="list-group">
    <a href="/client/dashboard" class="list-group-item">Dashboard</a>
    <a href="/client/edit" class="list-group-item">Edit Profile</a>
    <a href="/client/contractors/search" class="list-group-item">Search Contractor</a>
    <a href="/client/interviews/required" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsRequired}}</span>Interviews Required</a>
    <a href="/client/interviews/replaced" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsReplaced}}</span>Interviews Replaced</a>
    <a href="/client/interviews/accepted" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsAccepted}}</span>Interviews Accepted</a>
    <a href="/client/interviews/refused" class="list-group-item"><span class="badge">{{$data->interviewStatus->interviewsRefused}}</span>Interviews Refused</a>
    <a href="/client/projects/active" class="list-group-item"><span class="badge">{{$data->projectStatus->projectActive}}</span>Project Active</a>
    <a href="/client/logout" class="list-group-item">Logout</a>
</div>