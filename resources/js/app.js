import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.followData = function (userId, isFollowing, followersCount, followUrl) {
    return {
        following: isFollowing,
        followersCount: followersCount,
        async follow() {
            this.following = !this.following;
            try {
                const res = await axios.post(followUrl);
                this.followersCount = res.data.followersCount;
            } catch (error) {
                console.log(error);
            }
        }
    }
}

Alpine.start();

