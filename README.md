# Simple Post View Counter

Counts front-end post views and provides a shortcode to display the total.

## Plugin URI

https://github.com/humayun-sarfraz/simple-post-view-counter

## Author

Humayun Sarfraz  
https://github.com/humayun-sarfraz

## Description

- **Tracks**: Increments a counter each time a single post is viewed.  
- **Stores**: Saves count in post meta (`spvc_view_count`).  
- **Displays**: Use the `[spvc_views]` shortcode anywhere in content or templates to show “X views”.

## Installation

1. Upload the `simple-post-view-counter` folder to `/wp-content/plugins/`.  
2. Activate **Simple Post View Counter** via **Plugins**.  
3. Insert the shortcode `[spvc_views]` in your post content or template to display the view count.

## Usage

```html
<!-- In post content -->
<p>This post has been viewed: [spvc_views]</p>
