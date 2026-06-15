Yoast SEO
=========
Requires at least: 6.8
Tested up to: 7.0
Requires PHP: 7.4

Changelog
=========

<<<<<<< HEAD
## 27.5

Release date: 2026-04-28

#### Enhancements

* Adds a Yoast ability for retrieving scores for Yoast analyses for recent posts, using the Abilities API.
* Adds Qatar to the list of available countries for the Semrush related keyphrase suggestions.

#### Bugfixes

* Fixes a bug where the AI Generator's "Generate with AI" feature failed after a site's domain was changed, because stale callback URLs remained registered with the Yoast API from the original domain.

#### Other

* Removes the schemamap line from the `robots.txt` file.
* Introduces a performance increase when calculating if the SEO optimization is completed for internal links. Props to [@adconecto](https://github.com/adconecto).

## 27.4

Release date: 2026-04-14

Yoast SEO 27.4 adds new tasks to the Task List, improves navigation within the editor, and fixes a bug where tasks were displaying in the wrong language. [Read the full release post here.](https://yoa.st/task-list)

#### Enhancements

* Enhances the task list with a task about customizing meta descriptions in recent content.
* Enhances the task list with a task about deleting the "Sample Page".
* Improves the UX of completing tasks that require users to go to specific part of the post editor, by redirecting them to the exact spot they need to be.
* Adds a "Yoast" tab to the WordPress Plugins screen that groups all installed Yoast plugins when two or more are present. Requires WordPress 7.0+.

#### Bugfixes

* Fixes a bug where the task list copies were displayed in the site language instead of the user language.
* Fixes a bug where alt text changes made via the inline image editor in How-to and FAQ blocks were not being reflected on the frontend. Props to [@param-chandarana](https://github.com/param-chandarana).

=======
## 27.8

Release date: 2026-06-09

#### Enhancements

* Significantly reduces loading times of the root sitemap on sites with many users.
* Reduces loading times of the author sitemap on sites with many users.
* Makes the schema aggregator faster by drastically reducing the roundtrips to the database, when indexables are disabled.
* Makes the SEO optimization faster by drastically reducing the roundtrips to the database.
* Prevents unnecessary expensive DB queries when admin pages are being visited.
* Optimizes expensive DB queries when performing actions in admin pages related to SEO optimization.

#### Bugfixes

* Ensures compatibility with the React 19 version bundled in Gutenberg 23.3 (WordPress 7.1), fixing several screens and components that could otherwise fail to render.
* Fixes a bug where the dismiss button in the Webinar promo notice in general page was transparent.
* Improves post editor rendering performance by stabilising Redux selector and `withSelect` references in multiple components to prevent unnecessary re-renders.
* Fixes a bug where NaN was set as the Primary taxonomy and triggered a console error.

#### Other

* Removes the Yoast group from the filter bar on the WordPress plugins list.
* Sets the title of a child task to "(no title)" in the task list, when the related post has no title.
* Introduces the `wpseo_custom_fields_pre_query` filter, allowing sites to short-circuit the potentially expensive custom-fields lookup in Yoast settings, with a pre-computed list or a custom query.

## 27.7

Release date: 2026-06-02

#### Bugfixes

* Fixes a bug where the block editor was crashing when some AI features were triggering errors.
* Fixes a bug where a `FocusTrap` warning was thrown and the X button did not receive focus when the replace content confirmation modal from the AI Content Planner was opened. 
* Fixes a bug where only the first piece was returned when indexables were not available. 
* Fixes a bug where a warning was triggered in the console when editing a post with the Content Planner feature enabled.
* Fixes a bug in Schema aggregator where products Schema pieces had  incorrect `@id` values for `mainEntityOfPage` and `image` properties.
* Fixes a bug where the AI features section was rendered twice on the user profile page.

#### Other

* Makes the Academy, Upgrade and Brand insights links visible to more user roles.
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6

### Earlier versions
For the changelog of earlier versions, please refer to [the changelog on yoast.com](https://yoa.st/yoast-seo-changelog).
