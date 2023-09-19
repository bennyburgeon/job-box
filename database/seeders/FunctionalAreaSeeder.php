<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\JobBoard\Models\FunctionalArea;
use Illuminate\Support\Facades\DB;

class FunctionalAreaSeeder extends BaseSeeder
{
    public function run(): void
    {
        FunctionalArea::query()->truncate();
        DB::table('jb_functional_areas_translations')->truncate();

        $data = [
            'Accountant',
            'Accounts, Finance & Financial Services',
            'Admin',
            'Admin Operation',
            'Administration',
            'Administration Clerical',
            'Advertising',
            'Advertising',
            'Advertisement',
            'Architects & Construction',
            'Architecture',
            'Bank Operation',
            'Business Development',
            'Business Management',
            'Business Systems Analyst',
            'Clerical',
            'Client Services & Customer Support',
            'Computer Hardware',
            'Computer Networking',
            'Consultant',
            'Content Writer',
            'Corporate Affairs',
            'Creative Design',
            'Creative Writer',
            'Customer Support',
            'Data Entry',
            'Data Entry Operator',
            'Database Administration (DBA)',
            'Development',
            'Distribution & Logistics',
            'Education & Training',
            'Electronics Technician',
            'Engineering',
            'Engineering Construction',
            'Executive Management',
            'Executive Secretary',
            'Field Operations',
            'Front Desk Clerk',
            'Front Desk Officer',
            'Graphic Design',
            'Hardware',
            'Health & Medicine',
            'Health & Safety',
            'Health Care',
            'Health Related',
            'Hotel Management',
            'Hotel/Restaurant Management',
            'HR',
            'Human Resources',
            'Import & Export',
            'Industrial Production',
            'Installation & Repair',
            'Interior Designers & Architects',
            'Intern',
            'Internship',
            'Investment Operations',
            'IT Security',
            'IT Systems Analyst',
            'Legal & Corporate Affairs',
            'Legal Affairs',
            'Legal Research',
            'Logistics & Warehousing',
            'Maintenance/Repair',
            'Management Consulting',
            'Management Information System (MIS)',
            'Managerial',
            'Manufacturing',
            'Manufacturing & Operations',
            'Marketing',
            'Marketing',
            'Media - Print & Electronic',
            'Media & Advertising',
            'Medical',
            'Medicine',
            'Merchandising',
            'Merchandising & Product Management',
            'Monitoring & Evaluation (M&E)',
            'Network Administration',
            'Network Operation',
            'Online Advertising',
            'Online Marketing',
            'Operations',
            'Planning',
            'Planning & Development',
            'PR',
            'Print Media',
            'Printing',
            'Procurement',
            'Product Developer',
            'Product Development',
            'Product Development',
            'Product Management',
            'Production',
            'Production & Quality Control',
            'Project Management',
            'Project Management Consultant',
            'Public Relations',
            'QA',
            'QC',
            'Qualitative Research',
            'Quality Assurance (QA)',
            'Quality Control',
            'Quality Inspection',
            'Recruiting',
            'Recruitment',
            'Repair & Overhaul',
            'Research & Development (R&D)',
            'Research & Evaluation',
            'Research & Fellowships',
            'Researcher',
            'Restaurant Management',
            'Retail',
            'Retail & Wholesale',
            'Retail Buyer',
            'Retail Buying',
            'Retail Merchandising',
            'Safety & Environment',
            'Sales',
            'Sales & Business Development',
            'Sales Support',
            'Search Engine Optimization (SEO)',
            'Secretarial, Clerical & Front Office',
            'Security',
            'Security & Environment',
            'Security Guard',
            'SEM',
            'SMO',
            'Software & Web Development',
            'Software Engineer',
            'Software Testing',
            'Stores & Warehousing',
            'Supply Chain',
            'Supply Chain Management',
            'Systems Analyst',
            'Teachers/Education, Training & Development',
            'Technical Writer',
            'Tele Sale Representative',
            'Telemarketing',
            'Training & Development',
            'Transportation & Warehousing',
            'TSR',
            'Typing',
            'Warehousing',
            'Web Developer',
            'Web Marketing',
            'Writer',
            'PR',
            'QA',
            'QC',
            'SEM',
            'SMO',
            'TSR',
            'HR',
            'QA',
            'QC',
            'SEM',
        ];

        foreach ($data as $item) {
            FunctionalArea::query()->create(['name' => $item]);
        }
    }
}
