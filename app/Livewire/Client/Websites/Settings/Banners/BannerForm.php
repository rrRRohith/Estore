<?php
namespace App\Livewire\Client\Websites\Settings\Banners;

use App\Livewire\Form;

use App\Models\Banner;
use App\Models\Website;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class BannerForm extends Form
{
    use WithFileUploads;
    public ?Banner $banner = null;
    public ?Website $website = null;
    public string|null $title = null;
    public string|null $status;

    public ?UploadedFile $desktop = null;
    public int $desktop_removed = 0;

    public ?UploadedFile $mobile = null;
    public int $mobile_removed = 0;

    public string|null $link = null;
    public string|null $placement = null;
    public string|null $position = null;
    public string|null $type = null;
    public string|null $link_newtab;

    public function setWebsite(?Website $website = null): void
    {
        $this->website = $website;
    }

    public function setBanner(?Banner $banner = null): void
    {
        $this->banner = $banner;
        $this->title = $banner->title;
        $this->status = $banner->status;
        $this->link = $banner->link;
        $this->placement = $banner->placement;
        $this->position = $banner->position;
        $this->type = $banner->type;
        $this->link_newtab = $banner->link_newtab;
    }

    public function save()
    {
        $this->prepareValidation();
        $this->validate();
        try {
            if ($this->banner) {
                // Update existing banner
                $this->banner->update($this->only([
                    'title', 'slug', 'status', 'placement', 'link', 'link_newtab',
                ]));
            } else {
                // Create new banner
                $this->banner = $this->website->banners()->create($this->only([
                    'title', 'slug', 'status', 'placement', 'link', 'link_newtab',
                ]) + [
                    'client_id' => $this->website->client_id,
                ]);
            }
            $this->banner->updateDesktopPicture($this->desktop, (int) $this->desktop_removed);
            $this->banner->updateMobilePicture($this->mobile, (int) $this->mobile_removed);
            return ([
                'status' => 'success',
                'message' => $this->banner->wasRecentlyCreated ? 'Banner created successfully.' : 'Banner updated successfully.',
                'redirect' => route('client.websites.settings.banners.index', $this->website),
            ]);

        } catch (\Exception $e) {

            return $this->error($e);
        }
    }

    /**
     * Before validation, prepare the values and do necessary changes
     */
    public function prepareValidation(): void
    {
        $this->status = isset($this->status) && $this->status ? '1' : '0';
        $this->link_newtab = isset($this->link_newtab) && $this->link_newtab ? '1' : '0';
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'nullable', 'string', 'max:128'],
            //'type' => ['required', 'in:video,image'],
            'link' => ['sometimes', 'nullable', 'string'],
            'placement' => ['required', 'in:slider,breadcrumb'],
            'position' => ['sometimes', 'nullable', 'numeric'],
            'status' => ['nullable'],
            'link_newtab' => ['nullable'],
            'desktop' => ["bail", "nullable", "image", "mimes:webp,jpg,png,jpeg", "max:2048"],
            'mobile' => ["bail", "nullable", "image", "mimes:webp,jpg,png,jpeg", "max:2048"],
        ];
    }
}
