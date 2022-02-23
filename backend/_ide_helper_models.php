<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
	/**
	 * App\Models\Area
	 *
	 * @property int $id
	 * @property \App\Enums\Country $country_code 国コード
	 * @property \App\Enums\Prefecture|null $prefecture_code 都道府県コード
	 * @property string|null $municipality_code 市区町村コード
	 * @property string|null $municipality 市区町村名
	 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
	 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCountryCode($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Area whereMunicipality($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Area whereMunicipalityCode($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Area wherePrefectureCode($value)
	 */
	class Area extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\Notice
	 *
	 * @property int $id
	 * @property \App\Enums\NoticeGenre $genre お知らせジャンル
	 * @property string $date 日付
	 * @property string $title タイトル
	 * @property string $description 説明
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @method static \Database\Factories\NoticeFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice query()
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereDate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereGenre($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereTitle($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereUpdatedAt($value)
	 */
	class Notice extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\Project
	 *
	 * @property int $id
	 * @property int $representative_id
	 * @property string $name プロジェクト名
	 * @property string $description 説明欄
	 * @property string|null $thumbnail サムネイル用画像のパス
	 * @property string $place_of_activity 活動場所
	 * @property string $start_date プロジェクト期間(開始)
	 * @property string|null $end_date プロジェクト期間(終了)
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property-read Project $project
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProjectBelonged[] $projectBelonged
	 * @property-read int|null $project_belonged_count
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProjectParticipationRequest[] $projectParticipationRequest
	 * @property-read int|null $project_participation_request_count
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProjectProgress[] $projectProgress
	 * @property-read int|null $project_progress_count
	 * @method static \Database\Factories\ProjectFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEndDate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePlaceOfActivity($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereRepresentativeId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStartDate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereThumbnail($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
	 */
	class Project extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\ProjectBelonged
	 *
	 * @property int $id
	 * @property int $user_id
	 * @property int $project_id
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property-read \App\Models\Project $project
	 * @property-read \App\Models\User $userInviteCode
	 * @method static \Database\Factories\ProjectBelongedFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged query()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged whereProjectId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged whereUpdatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectBelonged whereUserId($value)
	 */
	class ProjectBelonged extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\ProjectParticipationRequest
	 *
	 * @property int $id
	 * @property int $project_id
	 * @property int $user_id
	 * @property string $comment 参加リクエストのコメント
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property-read \App\Models\Project $project
	 * @property-read \App\Models\User $user
	 * @method static \Database\Factories\ProjectParticipationRequestFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest query()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest whereComment($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest whereProjectId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest whereUpdatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectParticipationRequest whereUserId($value)
	 */
	class ProjectParticipationRequest extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\ProjectProgress
	 *
	 * @property int $id
	 * @property int $project_id
	 * @property string $date 日付
	 * @property string $title タイトル
	 * @property string $description 説明
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property-read \App\Models\Project $project
	 * @method static \Database\Factories\ProjectProgressFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress query()
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress whereDate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress whereProjectId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress whereTitle($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProgress whereUpdatedAt($value)
	 */
	class ProjectProgress extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\UUMajor
	 *
	 * @property int $id
	 * @property string $name 学科
	 * @property \App\Enums\UUFaculty $faculty_id 学部とつなげる
	 * @method static \Illuminate\Database\Eloquent\Builder|UUMajor newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UUMajor newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UUMajor query()
	 * @method static \Illuminate\Database\Eloquent\Builder|UUMajor whereFacultyId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UUMajor whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UUMajor whereName($value)
	 */
	class UUMajor extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\User
	 *
	 * @property int $id
	 * @property string $name
	 * @property string $email
	 * @property \Illuminate\Support\Carbon|null $email_verified_at
	 * @property string $password
	 * @property string|null $two_factor_secret
	 * @property string|null $two_factor_recovery_codes
	 * @property string|null $remember_token
	 * @property int|null $current_team_id
	 * @property string|null $profile_photo_path
	 * @property int $user_role_id
	 * @property int|null $invited_id
	 * @property string|null $retired_at 退部した日
	 * @property string|null $deleted_at
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property-read string $profile_photo_url
	 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
	 * @property-read int|null $notifications_count
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $project
	 * @property-read int|null $project_count
	 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
	 * @property-read int|null $tokens_count
	 * @property-read \App\Models\UserInfo $userInfo
	 * @property-read \App\Models\UserInviteCode $userInviteCode
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserLink[] $userLink
	 * @property-read int|null $user_link_count
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserTimeline[] $userTimeline
	 * @property-read int|null $user_timeline_count
	 * @method static \Database\Factories\UserFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|User query()
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereInvitedId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereRetiredAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRoleId($value)
	 */
	class User extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\UserInfo
	 *
	 * @property int $id
	 * @property int $user_id
	 * @property string $birth_day 誕生日
	 * @property string|null $last_name 姓
	 * @property string $first_name 名
	 * @property string|null $description 自己紹介
	 * @property \App\Enums\Grade $grade enum学年
	 * @property int $is_udai 宇大かそうでないか
	 * @property int|null $u_u_major_id
	 * @property mixed|null $university_meta 大学情報
	 * @property mixed|null $company_meta 企業情報
	 * @property \App\Enums\Gender $gender enum性別
	 * @property int $live_area_id
	 * @property int $birth_area_id
	 * @property int $is_dark_mode ダークモードにするか？
	 * @property int $is_publish_birth_day 誕生日公開するか？
	 * @property int $is_graduate 卒業したか？
	 * @property string $status ひとこと(GitHubのstatusと同じ)
	 * @property string|null $github_id GitHubのid
	 * @property string|null $line_name LINEでのユーザー名
	 * @property string|null $slack_name Slackでのユーザー名
	 * @property string|null $discord_name Discordでのユーザー名
	 * @property string|null $hobbies 趣味
	 * @property string|null $interests 興味
	 * @property string|null $motto 座右の銘
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property-read \App\Models\Area $area
	 * @property-read \App\Models\UUMajor $uuMajor
	 * @method static \Database\Factories\UserInfoFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo query()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereBirthAreaId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereBirthDay($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereCompanyMeta($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereDiscordName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereFirstName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereGender($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereGithubId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereGrade($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereHobbies($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereInterests($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereIsDarkMode($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereIsGraduate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereIsPublishBirthDay($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereIsUdai($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereLastName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereLineName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereliveAreaId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereMotto($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereSlackName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereStatus($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereUniversityMeta($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereUpdatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereUserId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInfo whereUuMajorId($value)
	 */
	class UserInfo extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\UserInviteCode
	 *
	 * @property int $id
	 * @property int $user_id
	 * @property string $code 招待コード
	 * @property string|null $created_at
	 * @property string|null $updated_at
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode query()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode whereCode($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode whereUpdatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserInviteCode whereUserId($value)
	 */
	class UserInviteCode extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\UserLink
	 *
	 * @property int $id
	 * @property int $user_id
	 * @property string $url url
	 * @property string $name タイトル
	 * @property string|null $description 説明
	 * @method static \Database\Factories\UserLinkFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink query()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink whereName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink whereUrl($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserLink whereUserId($value)
	 */
	class UserLink extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\UserRole
	 *
	 * @property int $id 管理用のIDはこちらで(連番では無く、飛ばし飛ばしにすることで扱いやすくする)→このIDを元にSecurityClearanceを制御
	 * @property string $name 役職
	 * @property string|null $description 説明
	 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserRole query()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereName($value)
	 */
	class UserRole extends \Eloquent
	{
	}
}

namespace App\Models {
	/**
	 * App\Models\UserTimeline
	 *
	 * @property int $id
	 * @property int $user_id
	 * @property string $title タイトル
	 * @property string|null $description 説明
	 * @property int $genre Enumジャンル
	 * @property string $start_date 開始日(必須)
	 * @property string|null $end_date 終了日(必須でない)
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property-read \App\Models\User $user
	 * @method static \Database\Factories\UserTimelineFactory factory(...$parameters)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline query()
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereEndDate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereGenre($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereStartDate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereTitle($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereUpdatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|UserTimeline whereUserId($value)
	 */
	class UserTimeline extends \Eloquent
	{
	}
}
