<template>
    <div class="member-item">
        <div class="member-link">
            <div class="member-avatar-wrp">
                <div class="member-avatar">
                    <img v-if="groupInfo && groupInfo.logo" :src="asset('uploads/groups/' + groupInfo.logo + '?')">
                    <p v-if="groupInfo && !groupInfo.logo" class="first_letter">{{ groupInfo.name[0] }}</p>
                </div>
            </div>
            <div class="member-name">{{ groupInfo.name }}</div>
        </div>
        <div class="option-icons-section">
            <div class="unread-message-notify" v-if="unreadMessages != 0">
                <div class="unread-messages-number">{{unreadMessages}}</div>
            </div>
            <a class="option-icon-btn ml-2" v-if="authUser.id === groupInfo.user_id" :href="'group/edit/' + groupInfo.id">
                <span class="option-icon"><i class="fa fa-pen" aria-hidden="true"></i></span>
            </a>
            <a class="option-icon-btn" :href="'group-chatroom/' + groupInfo.id">
                <span class="option-icon"><i class="fa fa-comment" aria-hidden="true"></i></span>
            </a>
            <a class="option-icon-btn delete-group" href="javascript:;" :attr-data="groupInfo.id">
                <span class="option-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </a>
        </div>
    </div>
</template>

<script>
	export default {
		name: "GroupComponent",
		props: {
			authUser: {
				type: Object,
				required: true
			},
			groupInfo: {
				type: Object,
				required: true
			},
		},
		data() {
			return {
				unreadMessages: 0,
				channel: ""
			};
		},
		async created() {
            console.log('aaaa');
			const token = await this.fetchToken();
			await this.initializeClient(token);
			await this.fetchMessages();
		},
		methods: {
			async fetchToken() {
				const { data } = await axios.post("/api/token", {
					email: this.authUser.username
				});

				return data.token;
			},
			async initializeClient(token) {
				const client = await Twilio.Chat.Client.create(token);

				client.on("tokenAboutToExpire", async () => {
					const token = await this.fetchToken();

					client.updateToken(token);
				});

				this.channel = await client.getChannelByUniqueName(
					`${this.groupInfo.channel_unique_name}`
				);
			},
			async fetchMessages() {
                console.log(this.groupInfo);
				const lastMessageSid = this.groupInfo.last_read_message_sid;
				const data = (await this.channel.getMessages()).items;
				if (data.length) {
					const reverseData = data.reverse();
					if (lastMessageSid) {
						const targetIndex = reverseData.findIndex(item => item.sid == lastMessageSid);
						if (targetIndex) {
							this.unreadMessages = reverseData.filter((item, index) => index < targetIndex).length;
						}
					} else {
						this.unreadMessages = data.length;
					}
				}
			},
		}
	};
</script>
