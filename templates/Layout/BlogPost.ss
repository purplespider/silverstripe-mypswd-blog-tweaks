<div class="blogpost">
	
	<h1>$Title</h1>
	<p class="data">Posted on $PublishDate.format(jS F Y)<% if Comments.Count %> - $Comments.Count Comments<% end_if %></p>
	
	<% if FeaturedImage %>
	    <a href="$FeaturedImage.setwidth(1000).URL"><img class="featured" src="$FeaturedImage.setwidth(500).URL" width="$Width" height="$Height" alt="$Title" /></a>
	<% end_if %>

	$Content

</div>

$CommentsForm