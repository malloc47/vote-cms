# vote-cms
A PHP+MySQL-driven cms for managing student government elections

## Background

This is the result of a lock-yourself-up-and-program-'til-all-hours
endeavor while in college. An old project (circa 2005) that was
created in < 2 weeks, with no prior knowledge of PHP, MySQL, etc.
Might be useful in a very limited capacity for the small niche it was
created for. View/Control are hopelessly entangled, so there's little
flexibility for changing the layout. Due to the constraints it was
created under, there is no front-end for populating the database, so
this must all be done manually (some utility scripts are included
under /parser). And let's not even discuss (the lack of) security
vetting.

Certainly not even remotely modern-web-app-quality that one would
expect today, but not at all shabby for a learning project.

## Features

- Tested and maintained with a > 500 voter base over two years

- Handles arbitrary number of concurrent elections among voter group
 (i.e. can hold freshman, sophomore, junior, senior, etc. elections
 simultaneously, with each level being allowed to vote in
 pre-specified election(s))

- Handles permissions on a per-year basis (e.g. class of '12), so user
  list can persist for elections in subsequent years

- Capable of controlling when the polls open/close

- Partial registration system--voters must be entered by
  administrator, but can look up their passwords as needed

- Post-election statistics summarize the winners and the ballots

- Automatically handles contested vs. uncontested elections

- Anonymized ballots--IDs still attached to ballots to prevent
  duplicate votes, but votes cannot be associated with username
  without table join

- Administrative console to handle poll-related tasks

- Basic CMS functionality for controlling frontend pages

## Disclaimer

This repo ported from ancient, sloppily-managed CVS and sanitized of
all personal information stored in the database or code (though there
remain a few Easter eggs in the old database tables as a result of
very late-night programming binges). Originally run on a LAMP stack of
unknown version and build and deployed on an equally unspecified
LAMP. Briefly also edited to be built on a Windows-based LAMP, so
some vestiges of this might remain.

All this being said, this site has not been fully tested in seven
years, and especially not after my most recent cleanup. Thus there is
no guarantee any of it will work (in fact, this is very probable), or
offer any merit beyond a good case study in code that ought to be
refactored. Feel free to fork and cleanup if you happen to be
interested in the specific use-case afforded by the system. Do not
deploy as-is without vetting for security flaws.

---

Jarrell Waggoner  
/-/ [malloc47.com](http://www.malloc47.com)
