<h1>$Title</h1>

<% if CurrentCategory %>
    <p>Showings posts in the <strong>$CurrentCategory.Title</strong> category. - <a href="$Top.Link">View All Posts</a></p>
<% else_if CurrentTag %>
    <p>Showings posts tagged <strong>$CurrentTag.Title</strong>. - <a href="$Top.Link">View All Posts</a></p>
<% else %>
	$Content
<% end_if %>

<% loop PaginatedList %>

	<div class="blogshort">

		<h2><a href="$Link">$Title</a></h2>

		<p class="data">Posted on $PublishDate.format(jS F Y)<% if Comments.Count %> - <a href="{$Link}#comments-holder">$Comments.Count Comments</a><% end_if %></p>

		<% if FeaturedImage %>
		    <a href="$Link"><img class="featured" src="$FeaturedImage.setwidth(300).URL" width="$Width" height="$Height" alt="$Title" /></a>
		<% end_if %>

		<% if Parent.DisplayFullPosts %>
		    $Content
		    <p><a href="{$Link}#comments-holder">Leave a Comment</a></p>
		<% else %>
			<p class="summary">$summary</p>
			<% if IsLong %><p><a class="readmore" href="$Link">Continue Reading $IsLongPost</a></p><% end_if %>
		<% end_if %>

	</div>

<% end_loop %>