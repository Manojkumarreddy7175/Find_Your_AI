<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

$ai_tools = [
    "Text Generation" => [
         [
           "name" => "ChatGPT", 
           "url" => "https://chat.openai.com", 
           "logo" => "https://upload.wikimedia.org/wikipedia/commons/4/4f/OpenAI_Logo.svg"
         ],
         [
           "name" => "Bard", 
           "url" => "https://bard.google.com", 
           "logo" => "https://via.placeholder.com/60?text=Bard"
         ],
         [
           "name" => "Claude", 
           "url" => "https://anthropic.com", 
           "logo" => "https://via.placeholder.com/60?text=Claude"
         ],
         [
           "name" => "InferKit", 
           "url" => "https://inferkit.com", 
           "logo" => "https://via.placeholder.com/60?text=InferKit"
         ],
         [
           "name" => "Talk to Transformer", 
           "url" => "https://app.inferkit.com/demo", 
           "logo" => "https://via.placeholder.com/60?text=TtT"
         ]
    ],
    "Content Creation" => [
         [
           "name" => "Jasper", 
           "url" => "https://www.jasper.ai", 
           "logo" => "https://via.placeholder.com/60?text=Jasper"
         ],
         [
           "name" => "Writesonic", 
           "url" => "https://writesonic.com", 
           "logo" => "https://via.placeholder.com/60?text=Writesonic"
         ],
         [
           "name" => "Copy.ai", 
           "url" => "https://www.copy.ai", 
           "logo" => "https://via.placeholder.com/60?text=Copy.ai"
         ],
         [
           "name" => "Conversion.ai", 
           "url" => "https://www.jasper.ai", 
           "logo" => "https://via.placeholder.com/60?text=Conversion.ai"
         ],
         [
           "name" => "Snazzy AI", 
           "url" => "https://snazzy.ai", 
           "logo" => "https://via.placeholder.com/60?text=Snazzy+AI"
         ],
         [
           "name" => "AI Writer", 
           "url" => "https://ai-writer.com", 
           "logo" => "https://via.placeholder.com/60?text=AI+Writer"
         ]
    ],
    "Text Enhancement" => [
         [
           "name" => "DeepL Write", 
           "url" => "https://www.deepl.com/write", 
           "logo" => "https://via.placeholder.com/60?text=DeepL+Write"
         ],
         [
           "name" => "Grammarly", 
           "url" => "https://grammarly.com", 
           "logo" => "https://upload.wikimedia.org/wikipedia/commons/4/4a/Grammarly_logo.svg"
         ],
         [
           "name" => "Wordtune", 
           "url" => "https://www.wordtune.com", 
           "logo" => "https://via.placeholder.com/60?text=Wordtune"
         ]
    ],
    "Coding Assistant" => [
         [
           "name" => "GitHub Copilot", 
           "url" => "https://github.com/features/copilot", 
           "logo" => "https://upload.wikimedia.org/wikipedia/commons/9/91/GitHub_Logo.png"
         ],
         [
           "name" => "OpenAI Codex", 
           "url" => "https://openai.com/blog/openai-codex", 
           "logo" => "https://via.placeholder.com/60?text=Codex"
         ]
    ],
    "Image Generation" => [
         [
           "name" => "Stable Diffusion", 
           "url" => "https://stability.ai", 
           "logo" => "https://via.placeholder.com/60?text=Stable+Diff."
         ],
         [
           "name" => "Midjourney", 
           "url" => "https://www.midjourney.com", 
           "logo" => "https://via.placeholder.com/60?text=Midjourney"
         ],
         [
           "name" => "DALL-E 2", 
           "url" => "https://openai.com/dall-e-2", 
           "logo" => "https://via.placeholder.com/60?text=DALL-E+2"
         ],
         [
           "name" => "Artbreeder", 
           "url" => "https://www.artbreeder.com", 
           "logo" => "https://via.placeholder.com/60?text=Artbreeder"
         ],
         [
           "name" => "Wombo Dream", 
           "url" => "https://www.wombo.art", 
           "logo" => "https://via.placeholder.com/60?text=Wombo+Dream"
         ],
         [
           "name" => "NightCafe", 
           "url" => "https://creator.nightcafe.studio", 
           "logo" => "https://via.placeholder.com/60?text=NightCafe"
         ],
         [
           "name" => "Deep Dream Generator", 
           "url" => "https://deepdreamgenerator.com", 
           "logo" => "https://via.placeholder.com/60?text=Deep+Dream"
         ],
         [
           "name" => "Pixray", 
           "url" => "https://pixray.gob.io", 
           "logo" => "https://via.placeholder.com/60?text=Pixray"
         ],
         [
           "name" => "DeepArt.io", 
           "url" => "https://deepart.io", 
           "logo" => "https://via.placeholder.com/60?text=DeepArt"
         ]
    ],
    "Video & Image" => [
         [
           "name" => "Runway ML", 
           "url" => "https://runwayml.com", 
           "logo" => "https://via.placeholder.com/60?text=Runway+ML"
         ],
         [
           "name" => "Runway Gen-2", 
           "url" => "https://runwayml.com/gen2", 
           "logo" => "https://via.placeholder.com/60?text=Runway+Gen-2"
         ]
    ],
    "Audio/Video Editing" => [
         [
           "name" => "Descript", 
           "url" => "https://www.descript.com", 
           "logo" => "https://via.placeholder.com/60?text=Descript"
         ]
    ],
    "Video Creation" => [
         [
           "name" => "Synthesia", 
           "url" => "https://www.synthesia.io", 
           "logo" => "https://via.placeholder.com/60?text=Synthesia"
         ],
         [
           "name" => "Lumen5", 
           "url" => "https://lumen5.com", 
           "logo" => "https://via.placeholder.com/60?text=Lumen5"
         ],
         [
           "name" => "InVideo", 
           "url" => "https://invideo.io", 
           "logo" => "https://via.placeholder.com/60?text=InVideo"
         ]
    ],
    "Music Generation" => [
         [
           "name" => "Aiva", 
           "url" => "https://www.aiva.ai", 
           "logo" => "https://via.placeholder.com/60?text=Aiva"
         ],
         [
           "name" => "Amper Music", 
           "url" => "https://www.ampermusic.com", 
           "logo" => "https://via.placeholder.com/60?text=Amper"
         ],
         [
           "name" => "Boomy", 
           "url" => "https://boomy.com", 
           "logo" => "https://via.placeholder.com/60?text=Boomy"
         ],
         [
           "name" => "Soundraw", 
           "url" => "https://soundraw.io", 
           "logo" => "https://via.placeholder.com/60?text=Soundraw"
         ]
    ],
    "Voice Synthesis" => [
         [
           "name" => "Murf AI", 
           "url" => "https://murf.ai", 
           "logo" => "https://via.placeholder.com/60?text=Murf"
         ],
         [
           "name" => "Replica Studios", 
           "url" => "https://replicastudios.com", 
           "logo" => "https://via.placeholder.com/60?text=Replica"
         ],
         [
           "name" => "Altered Studio", 
           "url" => "https://altered.ai", 
           "logo" => "https://via.placeholder.com/60?text=Altered"
         ]
    ],
    "Content Optimization" => [
         [
           "name" => "Frase", 
           "url" => "https://www.frase.io", 
           "logo" => "https://via.placeholder.com/60?text=Frase"
         ],
         [
           "name" => "INK Editor", 
           "url" => "https://inkforall.com", 
           "logo" => "https://via.placeholder.com/60?text=INK+Editor"
         ]
    ],
    "Chatbot" => [
         [
           "name" => "Kuki AI Chatbot", 
           "url" => "https://kuki.ai", 
           "logo" => "https://via.placeholder.com/60?text=Kuki"
         ],
         [
           "name" => "YouChat", 
           "url" => "https://you.com", 
           "logo" => "https://via.placeholder.com/60?text=YouChat"
         ],
         [
           "name" => "ChatSonic", 
           "url" => "https://writesonic.com/chat", 
           "logo" => "https://via.placeholder.com/60?text=ChatSonic"
         ]
    ],
    "SEO & Content" => [
         [
           "name" => "GrowthBar AI", 
           "url" => "https://www.growthbarseo.com", 
           "logo" => "https://via.placeholder.com/60?text=GrowthBar"
         ]
    ],
    "Interactive Storytelling" => [
         [
           "name" => "AI Dungeon", 
           "url" => "https://play.aidungeon.io", 
           "logo" => "https://via.placeholder.com/60?text=AI+Dungeon"
         ]
    ],
    "Communication" => [
         [
           "name" => "Poised AI", 
           "url" => "https://www.poised.com", 
           "logo" => "https://via.placeholder.com/60?text=Poised"
         ]
    ],
    "Image Captioning" => [
         [
           "name" => "Caption AI Pro", 
           "url" => "https://www.captionai.com/pro", 
           "logo" => "https://via.placeholder.com/60?text=Caption+AI"
         ]
    ],
    "Data Analysis" => [
         [
           "name" => "DataRobot", 
           "url" => "https://www.datarobot.com", 
           "logo" => "https://via.placeholder.com/60?text=DataRobot"
         ],
         [
           "name" => "BigML", 
           "url" => "https://bigml.com", 
           "logo" => "https://via.placeholder.com/60?text=BigML"
         ]
    ],
    "Text Analysis" => [
         [
           "name" => "MonkeyLearn", 
           "url" => "https://monkeylearn.com", 
           "logo" => "https://via.placeholder.com/60?text=MonkeyLearn"
         ]
    ],
    "Machine Learning" => [
         [
           "name" => "Lobe", 
           "url" => "https://www.lobe.ai", 
           "logo" => "https://via.placeholder.com/60?text=Lobe"
         ],
         [
           "name" => "Teachable Machine", 
           "url" => "https://teachablemachine.withgoogle.com", 
           "logo" => "https://via.placeholder.com/60?text=Teachable+Machine"
         ]
    ],
    "Image & Video Analysis" => [
         [
           "name" => "Clarifai", 
           "url" => "https://www.clarifai.com", 
           "logo" => "https://via.placeholder.com/60?text=Clarifai"
         ]
    ],
    "Translation" => [
         [
           "name" => "DeepL Translator", 
           "url" => "https://www.deepl.com/translator", 
           "logo" => "https://via.placeholder.com/60?text=DeepL"
         ]
    ],
    "Social Media" => [
         [
           "name" => "Lately AI", 
           "url" => "https://www.lately.ai", 
           "logo" => "https://via.placeholder.com/60?text=Lately"
         ]
    ],
    "Various" => [
         [
           "name" => "Hugging Face Spaces", 
           "url" => "https://huggingface.co/spaces", 
           "logo" => "https://via.placeholder.com/60?text=Hugging+Face"
         ],
         [
           "name" => "Inferex", 
           "url" => "https://inferex.com", 
           "logo" => "https://via.placeholder.com/60?text=Inferex"
         ]
    ]
];

// Read approved submissions from submissions.json and merge them
$file = 'submissions.json';
if (file_exists($file)) {
    $submissions = json_decode(file_get_contents($file), true);
    if (is_array($submissions)) {
        foreach ($submissions as $submission) {
            if (!empty($submission['approved'])) {
                $category = $submission['category'];
                // Create tool entry from submission
                $toolEntry = [
                    "name" => $submission['name'],
                    "url"  => $submission['url'],
                    "logo" => $submission['logo']
                ];
                // If the category doesn't exist in the array, create it
                if (!isset($ai_tools[$category])) {
                    $ai_tools[$category] = [];
                }
                $ai_tools[$category][] = $toolEntry;
            }
        }
    }
}

echo json_encode($ai_tools, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>