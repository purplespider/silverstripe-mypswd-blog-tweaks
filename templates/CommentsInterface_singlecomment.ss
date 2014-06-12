<p class="info" id="<% if isPreview %>comment-preview<% else %>$Permalink<% end_if %>">
	<span class="name">$AuthorName.XML</span> <span class="time"> <% if $Created.TimeDiffIn(days) > 14 %>
	    $Created.Nice
	<% else %>
		$Created.Ago
	<% end_if %></span>
</p>

<div class="comment">
<% if $Gravatar %><img class="gravatar" src="$Gravatar" alt="Gravatar for $Name" title="Gravatar for $Name" /><% end_if %>
	$EscapedComment
</div>

<% if not isPreview %>
	<% if $ApproveLink || $DeleteLink %>
		<ul class="action-links">
			<% if ApproveLink %>
				<li><a href="$ApproveLink.ATT" class="approve">Approve Comment</a></li>
			<% end_if %>
			<% if DeleteLink %>
				<li class="last"><a href="$DeleteLink.ATT" class="delete">Delete Comment</a></li>
			<% end_if %>
		</ul>
	<% end_if %>
<% end_if %>
