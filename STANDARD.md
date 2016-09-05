#Coding Standard for this project

##All
- Tabs will be 2 spaces. No tabs
- No extra white space at end of lines
- 1 will equal TRUE and 0 will equal FALSE
- Line breaks at 70 characters


##Html
### Syntax
- Use soft tabs with two spaces—they're the only way to guarantee code renders the same in any environment.
- Nested elements should be indented once (two spaces).
- Always use double quotes, never single quotes, on attributes.
- Don't include a trailing slash in self-closing elements—the HTML5 spec says they're optional.
- Don’t omit optional closing tags (e.g. ```</li>``` or ```</body>```).
- HTML 5 doctype ```<!DOCTYPE html>```
- Page Language ```<html lang="en-us">```
- Per HTML5 spec, typically there is no need to specify a type when including CSS and JavaScript files

###Attribute order
HTML attributes should come in this particular order for easier reading of code.

- class
- id, name
- data-*
- src, for, type, href, value
- title, alt
- role, aria-*

##CSS
###Syntax
- Use soft tabs with two spaces—they're the only way to guarantee code renders the same in any environment.
- When grouping selectors, keep individual selectors to a single line.
- Include one space before the opening brace of declaration blocks for legibility.
- Place closing braces of declaration blocks on a new line.
- Include one space after : for each declaration.
- Each declaration should appear on its own line for more accurate error reporting.
- End all declarations with a semi-colon. The last declaration's is optional, but your code is more error prone without it.
- Comma-separated property values should include a space after each comma (e.g., box-shadow).
- Don't include spaces after commas within rgb(), rgba(), hsl(), hsla(), or rect() values. This helps differentiate multiple color values (comma, no space) from multiple property values (comma with space).
- Don't prefix property values or color parameters with a leading zero (e.g., .5 instead of 0.5 and -.5px instead of -0.5px).
- Lowercase all hex values, e.g., #fff. Lowercase letters are much easier to discern when scanning a document as they tend to have more unique shapes.
- Use shorthand hex values where available, e.g., #fff instead of #ffffff.
- Quote attribute values in selectors, e.g., input[type="text"]. They’re only optional in some cases, and it’s a good practice for consistency.
- Avoid specifying units for zero values, e.g., margin: 0; instead of margin: 0px;.

###Declaration order
Related property declarations should be grouped together following the order:

1) Positioning
2) Box model
3) Typographic
4) Visual

###Single declarations
In instances where a rule set includes only one declaration, consider
removing line breaks for readability and faster editing. Any rule set
with multiple declarations should be split to separate lines.

###Comments
Code is written and maintained by people. Ensure your code is descriptive,
well commented, and approachable by others. Great code comments convey
context or purpose. Do not simply reiterate a component or class name.

Be sure to write in complete sentences for larger comments and succinct
phrases for general notes.

###Class names
- Keep classes lowercase and use dashes (not underscores or camelCase).Dashes serve as natural breaks in related class (e.g., .btn and .btn-danger).
- Avoid excessive and arbitrary shorthand notation. .btn is useful for button, but .s doesn't mean anything.
- Keep classes as short and succinct as possible.
- Use meaningful names; use structural or purposeful names over presentational.
- Prefix classes based on the closest parent or base class.
- Use .js-* classes to denote behavior (as opposed to style), but keep these classes out of your CSS.
- It's also useful to apply many of these same rules when creating Sass and Less variable names.

###Organization
- Organize sections of code by component.
- Develop a consistent commenting hierarchy.
- Use consistent white space to your advantage when separating sections of code for scanning larger documents.
- When using multiple CSS files, break them down by component instead of page. Pages can be rearranged and components moved.

##PHP
All PHP will be in compliance with the codeigniter 3.1 style guide found
[here](https://www.codeigniter.com/user_guide/general/styleguide.html) Except:

- We will use the short open tags only on view pages to display variables. ```<?= $foo ?>```
- We will only have only one class per file
- Any debugging code will have comment about what the problem was and will be kept untill production
