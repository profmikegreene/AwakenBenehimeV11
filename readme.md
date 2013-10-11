
#Coding Standards
##General


   * Variables, array elements, and blocks should be on separate lines
   * A 2-space tab is used for all indentation
   * Use `'single quotes'` unless escaping quotes is necessary
   * Always use braces `{} [] ()`
   * Never use `CamelCase`
   * Variables `$all-lowercase-separated-with-hyphens`
   * OOP Class names - `Capitalize_The_First_Letter_Of_Each_Word`
   * Functions - `all_lowercase_separated_with_underscores`
   * File names - `all-lowercase-separated-with-hyphens`



##HTML
   * HTML 5 Doctype
   * Must validate
##CSS
   * Each selector must be on a separate line
   * Selector names - `lowercase-separated-by-hyphens`
   * Files categorized by SMACSS
   * 
      * Base
      * Layout
      * Module
         * Modules that rely on DOM need to have dependencies commented in file
      * State
      * Theme
   * Use `.sidebar > .home` instead of `.sidebar .home` or `div > a`
   * Do NOT qualify classes with tags `a.home`
   * All classes introduced by JavaScript must be prefixed `.js-` unless they are state changes which begin with `.is-`
   * Do NOT use `.button.blue` selectors. Generate CSS that is modular enough to not be that specific
   
_Templates Rules_
	
	.template-name
	.template-name--modifier-name
	.template-name__sub-object
	.template-name__sub-object--modifier-name

_Module Rules_

	.module-name
	.module-name--modifier-name
	.module-name__sub-object
	.module-name__sub-object--modifier-name

_Layout Rules_
	
	.l-layout-method
	.grid

_State Rules_

	.is-state-type

_Non-styled JavaScript Hooks_
	
	.js-action-name




##JavaScript


##PHP


##SQL
   * SQL keywords must be `ALL CAPS`

##Wordpress
   * Everywhere possible the theme should use the Wordpress dashboard for configuration and should not rely on direct code injection, i.e. the site should be able to function without the webmaster
   * Your theme may not generate any PHP warnings, errors, notices or validation errors for HTML, CSS or JavaScript.
   * Your theme may not generate any WordPress-generated errors or notices.
   * All required WordPress features, functions and code elements must be built in, and your theme must support WordPress’ default implementation of these features.
   * If implemented, the recommended features must work according to the specification.
   * Optional functionality must work according to the specification.
   * Wordpress must include the following theme features

##Libraries
   * jQuery 1.7.1
   * Modernizr 2.0.6
   * Google jsapi
   * Nivo Slider
   
#Style Guide
The Awaken Benehime theme will supply style and functionality for the entire rappahannock.edu

##Project Overview
   - Future student focus
   - Flat design
   - Usable on all devices
   - Fast
   - full width main slider like microsoft.com
   - redesigned IA
   - fully rely on WP dashboard

##Logos
Found at URL:

##Colors
Found at URL:

##Communication Guidelines
The Awaken Benehime project will support the following initiatives

- Provide easier access to and more of the following information 
	- Degree programs
	-Transfer agreements
	- Financial Aid and Scholarships
	- The quality of a RCC education
	- College campus attributes and student life opportunities
- place greater emphasis on:
	- Communicating the expectation of academic excellence.
	- Student life including team sports and activities.
	- Programs that extend awareness of RCC to groups outside the immediate audience.For example,a plan to attract high school seniors may include programs and activities for middle school children or those in their first years of high schooL
	- Open houses that bring traditional-age students and their parents to RCC to experience student life and see firsthand what RCC offers.
- Addressing questions and concerns of student prospects:
	- Will RCC offer the educational foundation I need to graduate and transfer to a four- year college or university?
	- Will I fit in at RCC? Will I meet new people and make new friends at RCC?
	- Does RCC offer support to help me make good educational decisions and life choices?
	- Does RCC offer a flexible schedule so I can work and go to school?
	- How does the cost of RCC compare to other schools?
	- How will I benefit by choosing RCC instead of another community college or four- year college or university?

Branding in higher education is about who you are,not what a particular product offers to the marketplace. An educational brand is often equated to an institution's academic reputation. However, that explanation is far too limiting. Think of a college or university brand as being synonymous with the institution's personality - aligning with its mission, defined by its values.

Open Door Communications Brand Promise
Rappahannock Community College recognizes that each student is unique and must follow his or her individual life path. RCC is committed to helping every student identify his or her educational path; to nurturing and promoting intellectual and personal growth; and to empowering his or her educational journey through an affirmative, total college experience. 

>"Our job is to lift people up." That's the RCC brand promise in a nutshell

##Launch##
Main site create nav menues
Upload plugin and JS dependencies


##Fix##
responsive billboard images