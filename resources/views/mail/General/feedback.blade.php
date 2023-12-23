@extends('layouts.mail.app')
@section('content')
    <tr>
        <td>Dear <strong>Admin,</strong></td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550">You have new feedback at {{site_name}} Account.
        </td>
    </tr>
    <tr>
        <td>Type:</td>
        <td>{{ucfirst($emailData['type'])}}</td>
    </tr>
    <tr>
        <td>Name:</td>
        <td>{{$emailData['name']}}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{$emailData['email']}}</td>
    </tr>
    <tr>
        <td>Description:</td>
        <td>{{$emailData['description']}}</td>
    </tr>
@endsection
