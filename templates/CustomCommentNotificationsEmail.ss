<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>A new comment has been posted on your blog.</p>

		<% if Moderated %><% else %>
		    <p style="color:red"><strong>This comment requires approval.</strong><br /></p>
		<% end_if %>

		<dl>
			<dt><strong>Blog Post:</strong></dt>
				<dd><a href="$Parent.AbsoluteLink">$Parent.Title</a></dd>
			<% if Name %>
				<dt><br /><strong>Name:</strong></dt>
				<dd>$Name.XML</dd>
			<% end_if %>
			<% if Email %>
				<dt><br /><strong>E-mail:</strong></dt>
				<dd><a href="mailto:$Email.XML">$Email.XML</a></dd>
			<% end_if %>
			<% if Comment %>
				<dt><br /><strong>Comment:</strong></dt>
				<dd>$Comment.XML</dd>
			<% end_if %>
		</dl>

		<% if Moderated %><% else %>
		    <p><br /><a href="{$BaseHref}/CommentApproval/processComment/{$ID}?token={$LinkToken}"><strong>APPROVE COMMENT</strong></a> | <a href="{$BaseHref}/CommentApproval/processComment/{$ID}?token={$LinkToken}&delete">DELETE COMMENT</a></p>
		<% end_if %>
	</body>
</html>