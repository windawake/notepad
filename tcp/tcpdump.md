##### 抓取 ip 为 192.168.1.104 到端口 8000 的数据包

sudo tcpdump -i any host 192.168.1.104 and dst port 8000

##### 三次握手抓包

sudo tcpdump -i any port 8000 -nn -A


#####  tcpdump抓到的报文是通过libpcap-1.9.1/pcap.c的pcap_loop方法捕捉

```
int
pcap_loop(pcap_t *p, int cnt, pcap_handler callback, u_char *user)
{
	register int n;

	for (;;) {
		if (p->rfile != NULL) {
			/*
			 * 0 means EOF, so don't loop if we get 0.
			 */
			n = pcap_offline_read(p, cnt, callback, user);
		} else {
			/*
			 * XXX keep reading until we get something
			 * (or an error occurs)
			 */
			do {
				n = p->read_op(p, cnt, callback, user);
			} while (n == 0);
		}
		if (n <= 0)
			return (n);
		if (!PACKET_COUNT_IS_UNLIMITED(cnt)) {
			cnt -= n;
			if (cnt <= 0)
				return (0);
		}
	}
}
```
