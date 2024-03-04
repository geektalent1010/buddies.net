
<template>
  <div class="notification-section" v-if="unreadMessages != 0">
		<span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
  </div>
</template>

<script>
	export default {
		name: "NewMessageNotifyForDashboard",
		props: {
			authUser: {
				type: String,
				required: true
			},
			channelsInfo: {
				type: Array,
				required: true
			},
		},
		data() {
			return {
				unreadMessages: 0,
				client: {}
			};
		},
		async created() {
			const token = await this.fetchToken();
			await this.initializeClient(token);

            this.channelsInfo.map(channelInfo => this.fetchMessages(channelInfo));
		},
		methods: {
			async fetchToken() {
				const { data } = await axios.post("/api/token", {
					email: this.authUser
				});

				return data.token;
			},
			async initializeClient(token) {
				this.client = await Twilio.Chat.Client.create(token);

				this.client.on("tokenAboutToExpire", async () => {
					const token = await this.fetchToken();

					this.client.updateToken(token);
				});
			},
			async fetchMessages(channelInfo) {
				const lastMessageSid = channelInfo.last_read_message_sid;
                const channel = await this.client.getChannelByUniqueName(
                    `${channelInfo.channel_unique_name}`
                )
				const data = (await channel.getMessages()).items;
				if (data.length) {
					const reverseData = data.reverse();
					if (lastMessageSid) {
						const targetIndex = reverseData.findIndex(item => item.sid == lastMessageSid);
						if (targetIndex) {
							this.unreadMessages = Math.max(reverseData.filter((item, index) => index < targetIndex).length, this.unreadMessages);
						}
					} else {
						this.unreadMessages = Math.max(data.length, this.unreadMessages);
					}
				}
			},
		}
	};
</script>
