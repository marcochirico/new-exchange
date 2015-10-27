@extends('admin.master')
@section('content')
@include('admin.shared.navbar')
<div class="container">
    <h4 class="head-border-bottom">Users Listview</h4>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Last login</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Mario</td>
                <td>Rossi</td>
                <td>mario.rossi@gmail.com</td>
                <td>Yesterday at 17:02</td>
                <td class="text-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mario</td>
                <td>Rossi</td>
                <td>mario.rossi@gmail.com</td>
                <td>Yesterday at 17:02</td>
                <td class="text-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mario</td>
                <td>Rossi</td>
                <td>mario.rossi@gmail.com</td>
                <td>Yesterday at 17:02</td>
                <td class="text-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mario</td>
                <td>Rossi</td>
                <td>mario.rossi@gmail.com</td>
                <td>Yesterday at 17:02</td>
                <td class="text-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mario</td>
                <td>Rossi</td>
                <td>mario.rossi@gmail.com</td>
                <td>Yesterday at 17:02</td>
                <td class="text-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Mario</td>
                <td>Rossi</td>
                <td>mario.rossi@gmail.com</td>
                <td>Yesterday at 17:02</td>
                <td class="text-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </td>
            </tr>

        </tbody>
    </table>

</div> <!-- /container -->
@stop