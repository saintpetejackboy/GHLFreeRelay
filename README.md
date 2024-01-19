# GHLFreeRelay
Don't pay GHL for premium and don't pay Zapier - they are vampires. 

I am sure you are wondering "How do I use this?"

The instructions are very simple and all you need is:

1.) A server that can run PHP files (virtually any server, VPS costs $8 or less per month).

2.) One GHL (A) account you want to send contacts to another GHL (B) account - can be sub accounts or entirely unrelated

3.) A workflow inside of GHL (A) that has ANY TRIGGER YOU WANT - can be a tag, contact created, etc.;

4.) This workflow sends a normal webhook with an extra custom field called "apikey" that has the value of GHL (B) apikey pasted in.


That's it! 


Here is how it works:

GHL is a scam MLM service and they want to charge you "premium" to do stuff like this. Second, Zapier (whom you likely would end up using at some point) is ALSO a garbage, incoherently expensive service.
I hope people realize how easy it is to do this stuff for basically free.


What are the limitations?

GHL has an API rate limit of about 100 per 10 seconds, or 200,000 per day. This if fairly generous. 200,000 requests through Zapier per day would bankrupt Jack Ma.

While this code is provided in PHP originally, it is easily translated to many langauges, so I will offer various other implementations in different areas here (eventually, maybe, feel free to add them yourselves).

This service does NOT send back the apikey, except in the header. If an invalid GHL API key is provided, nothing happens (if you are worried about bots crawling the script). 

No data is saved and no retries are attempted (except on the part of GHL). This script could easily be modified to save data to an external database or perform other operations.
