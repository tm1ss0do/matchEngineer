<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<style>

</style>

<table class="" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="">
<table class="" width="100%" cellpadding="0" cellspacing="0" role="presentation">
{{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td class="" width="100%" cellpadding="0" cellspacing="0">
<table class="" align="" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>
