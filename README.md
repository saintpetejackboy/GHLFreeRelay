# GHLFreeRelay
Don't pay GHL for premium and don't pay Zapier - they are vampires. 

I am sure you are wondering "How do I use this?"

Get a VPS or some other server that can server PHP files (very easy, under $8 at most per month if you don't already have one). 
Plop that index.php file into your server into a directory like /relay or /GHL/relay/index.php   - you don't need to modify it at all.

You can use the same GHL (sub accounts) OR two entirely unrelated GHL accounts. Pretend GHL (A) wants to send contacts to GHL (B)...

From GHL (B), you must use the agency dashboard to get the apikey for that subaccount, copy it to your clipboard.

In GHL (A), make a workflow with ANY TRIGGER YOU WANT. It can be contact created, a certain tag, doesn't matter. Have that workflow trigger a "webhook" to the URL we put the index.php in above.

Add a Custom Data to the webhook that has the name "apikey" and then paste the apikey in the value area. Save the workflow, and then test it before publishing.

That's it!


Here is how it works:

GHL is a scam MLM service and they want to charge you "premium" to do stuff like this. Second, Zapier (whom you likely would end up using at some point) is ALSO a garbage, incoherently expensive service.
I hope people realize how easy it is to do this for virtually $0.

The script sits there and waits for data from GHL (A) that comes with the apikey it needs to send the data to GHL (B). It doesn't do anything else, just that.

What are the limitations?

GHL has an API rate limit of about 100 per 10 seconds, or 200,000 per day. This is fairly generous. 200,000 requests through Zapier per day would bankrupt Jack Ma.

While this code is provided in PHP originally, it is easily translated to many langauges, so I will offer various other implementations in different areas here (eventually, maybe, feel free to add them yourselves).

This service does NOT send back the apikey, except in the header. If an invalid GHL API key is provided, nothing happens (if you are worried about bots crawling the script). 

No data is saved and no retries are attempted (except on the part of GHL). This script could easily be modified to save data to an external database or perform other operations.


** Special note: if you use some old PHP, you may need to enable libcurl - but I highly doubt it.
