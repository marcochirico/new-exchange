@extends('master')

@section('content')

<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Microsoft</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Oracle</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">SAP</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Adobe</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <br /><br />
            <div class="table-responsive table-condensed">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Business Analyst</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.200,00</td>
                            <td>USD</td>
                        </tr>
                        <tr>
                            <td>1.200,00</td>
                            <td>USD</td>
                        </tr>
                        <tr>
                            <td>1.200,00</td>
                            <td>USD</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Business Analyst</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.200,00</td>
                            <td>USD</td>
                        </tr>
                        <tr>
                            <td>1.200,00</td>
                            <td>USD</td>
                        </tr>
                        <tr>
                            <td>1.200,00</td>
                            <td>USD</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            <br /><br />
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">...</div>
        <div role="tabpanel" class="tab-pane" id="messages">...</div>
        <div role="tabpanel" class="tab-pane" id="settings">...</div>
    </div>

</div>

@stop