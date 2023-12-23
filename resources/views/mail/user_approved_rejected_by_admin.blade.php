@extends('layouts.mail.app')
@section('content')
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;">Dear <strong>{{$emailData['user_name']}},</strong></td>
    </tr>
    <tr>
        <td style="padding: 0 45px 5px; font-family: arial; font-size: 14px; color: #333; line-height: normal;"
            width="550">Your account {{$emailData['account_status']}} by admin.
        </td>
    </tr>
@endsection
